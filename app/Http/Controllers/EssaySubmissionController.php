<?php

namespace App\Http\Controllers;

use App\Jobs\Essays\SendAutomatedEmails;
use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\EssaySubmission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Jobs\ProcessEssaySubmission;
use Illuminate\Support\Facades\Http;


class EssaySubmissionController extends Controller
{
    const MAX_FREE_SUBMISSIONS = 2;
    const MAX_BASIC_SUBMISSIONS = 10;
    const MAX_PRO_SUBMISSIONS = 20;
    const MAX_PREMIUM_SUBMISSIONS = 50;


    public function create()
    {
        $product = Product::find(1001);      
        return view('dashboard.essays.create', compact('product'));
    }    

    public function index()
    {
        $essays = EssaySubmission::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.essays.index', compact('essays'));
    }

    public function show($locale, $id)
    {
        $essay = EssaySubmission::findOrFail($id);
        return view('dashboard.essays.show', compact('essay'));
    }

    public function progress()
    {
        $userId = auth()->id();

        $submissions = EssaySubmission::selectRaw('avg(score) as avg_score, MONTH(created_at) as month')
            ->where('user_id', $userId)
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();


        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $scores = array_fill(0, 12, null); // Initialize all months with 0

        foreach ($submissions as $submission) {
            $scores[$submission->month - 1] = $submission->avg_score;
        }

        return view('dashboard.essays.progress.show', ['labels' => $months, 'values' => $scores]);
    }

    public function handleEssaySubmission(Request $request)
    {
        $locale = app()->getLocale();        
        
        // Check if user is logged in
        if (!auth()->check()) {
            session(['url.intended' => route('dashboard.exam-prep.' . strtolower($request->type) . '.writing.submit', $locale)]);
            return back()->with('error', __('You must be logged in to submit an essay.'))
            ->withInput($request->only('exam', 'task', 'topic', 'essay'));
        }

        // User is logged in, check their subscriptions //
        $user = auth()->user();

        // Get count of user's subscriptions this month
        $submissions = $user->essaySubmissions()
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->count();

        if (!$user->hasSubscriptionLevel($user->id, 'essays') && !$user->hasSubscriptionLevel($user->id, 'basic')) {
            // Check if user has reached the limit for free essay submissions
            if ($submissions >= self::MAX_FREE_SUBMISSIONS) {
                return redirect()
                    ->route('exam-prep.ielts-coach.info', ['locale' => session('locale', 'en')])
                    ->with('error', 'You need to upgrade to Pro to continue using this tool.');
            }
        }

        if (!$user->hasSubscriptionLevel($user->id, 'pro')) {
            // Check if user has reached the limit for free essay submissions //            
            if ($submissions >= self::MAX_BASIC_SUBMISSIONS) {
                return redirect()
                    ->route('exam-prep.ielts-coach.info', ['locale' => session('locale', 'en')])
                    ->with('error', 'You need to upgrade to Pro to submit more essays.');
            }
        }

        if (!$user->hasSubscriptionLevel($user->id, 'premium')) {
            // Check if user has reached the limit for free essay submissions //            
            if ($submissions >= self::MAX_PRO_SUBMISSIONS) {
                return redirect()
                    ->route('exam-prep.ielts-coach.info', ['locale' => session('locale', 'en')])
                    ->with('error', 'You need to upgrade to Premium to submit more essays.');
            }
        }

        if ($submissions >= self::MAX_PREMIUM_SUBMISSIONS) {        
                return redirect()
                    ->route('exam-prep.ielts-coach.info', ['locale' => session('locale', 'en')])
                    ->with('error', "You've maxed out your essay submissions this month. Contact me if you 
                    need a custom subscription.");
        }

        // Validate the request
        $validatedData = $request->validate([            
            'type' => 'required|string|max:100',
            'exam' => 'required|string|max:100',
            'task' => 'nullable|string|max:100',
            'topic' => 'required|string|max:3000',
            'essay_content' => 'required|string|max:3000',
            'image_url' => 'nullable|string|max:3000',
        ]);

        // Check if image URL is valid
        if (array_key_exists('image_url', $validatedData) && $validatedData['image_url'] !== null) {
            $result = $this->validateImageUrl($validatedData['image_url']);
            if ($result !== true) {
                // If $result is not true, it contains an error message
                return redirect()->back()->with('error', $result);
            }
        }


        $validatedData['user_id'] = auth()->id();

        // create the EssaySubmission from the validated data
        $submission = EssaySubmission::create($validatedData);        

        // dispatch the essay grading job        
        ProcessEssaySubmission::dispatch($validatedData, $user->id, $submission->id, $locale);

        // send automated emails
        SendAutomatedEmails::dispatch($user->id);

        // Get the essay type to redirect to the appropriate success page
        $typeParameterForRoute = strtolower($validatedData['type']);

        return redirect()->route('dashboard.exam-prep.' . $typeParameterForRoute . '.writing.success', ['locale' => $locale])
        ->with('success', __('Your essay has been submitted. You will receive a notification when feedback is ready.'));
    }

    public function validateImageUrl($url)
    {
        try {
            $response = Http::get($url);

            if (!$response->successful()) {
                return 'Unable to access the image URL';
            }

            $contentType = $response->header('Content-Type');
            $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($contentType, $allowedMimes)) {
                return 'Unsupported image format. Allowed formats are: JPEG, PNG, GIF, WEBP';
            }

            $contentLength = $response->header('Content-Length');
            $maxSize = 20 * 1024 * 1024; // 20 MB
            if ($contentLength > $maxSize) {
                return 'The image file is too large. Maximum allowed size is 20 MB';
            }

            return true; // Image URL is valid

        } catch (\Exception $e) {
            return 'Error validating image: ' . $e->getMessage();
        }
    }

    public function store($type, $exam, $task, $topic, $essay, $feedback, $score, $userId)
    {                
        $submission = EssaySubmission::create([
            'user_id' => $userId,
            'type' => $type,
            'exam' => $exam,
            'task' => $task,
            'topic' => $topic,
            'essay_content' => $essay,
            'feedback' => $feedback,
            'score' => $score,
        ]);

        $this->trackEssaySubmissionEvent($userId, $exam, $score);

        return $submission->id;
    }

    public function success()
    {
        return view('dashboard.essays.success');
    }

    public function trackEssaySubmissionEvent($userId, $exam, $score)
    {
        Event::create([
            'user_id' => $userId,
            'anonymous_id' => session('uniqueID') ?? null,
            'name' => 'Essay Submitted',
            'properties' => json_encode([
                'type' => $exam,
                'score' => $score,
            ]),
        ]);

    }
}
