<?php

namespace App\Http\Controllers;

use App\Models\FlashcardSetGroup;
use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\PrivateLesson;
use App\Models\Plan;
use App\Models\Registration;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use NumberFormatter;
use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\MastermindWaitingListRequest;
use App\Models\Product;
use App\Models\SpeakingPracticeTest;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $locale = session('locale', 'en');
//
//        \App::setLocale($locale);

        return view('pages.welcome', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $selectValue = $request->input('selection');

        $selection = Selection::create([
            'id' => request('$course->id'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }

    public function about()
    {
        $courses = Course::all();

        $privateLessons = PrivateLesson::all();

        return view('pages.about', [
            'courses' => $courses,
            'ocourses' => $courses,
            'privateLessons' => $privateLessons,
        ]);
    }

    public function learnEnglish()
    {
        return view('pages.learn-english', []);
    }

    public function learnKorean()
    {
        return view('pages.learn-korean', []);
    }
    
    public function learnThai()
    {
        return view('pages.learn-thai', []);
    }

    public function learnVietnamese()
    {
        return view('pages.learn-vietnamese', []);
    }

    public function englishCourses()
    {
        $courses = Course::where('available', 1)->where('experience', 'in-person')->with('plans')->get();
        $privateLessons = PrivateLesson::all();

        return view('pages.english-courses', [
            'courses' => $courses,
            'privateLessons' => $privateLessons,
        ]);
    }

    public function ieltsCourses()
    {
        return view('pages.ielts-courses');
    }

    public function contact()
    {
        return view('contact', []);
    }

    public function levelTest()
    {
        return view('pages.level-test');
    }

    public function thankYou()
    {
        return view('thank-you');
    }

    public function meetings()
    {
        return view('pages.meetings');
    }


    public function subscribe()
    {
        return view('subscribe', []);
    }

    public function pricing()
    {
        return view('pages.pricing', []);
    }

    public function dashboard(Registration $registration)
    {
        $user = auth()->user();

        $courses = Course::where('experience', 'in-person')->get();

        $ocourses = Course::where('experience', 'online')->get();

        $plans = Plan::where('experience', 'in-person')->get();

        $oplans = Plan::where('experience', 'online')->get();

        $all_registrations = User::find($user->id)->registrations;

        $registrations = $all_registrations->where('active', true);

        return view('dashboard.dashboard', [
            'courses' => $courses,
            'ocourses' => $ocourses,
            'plans' => $plans,
            'oplans' => $oplans,
            'registrations' => $registrations,
        ]);
    }

    public function terms()
    {
        return view('legal.general-terms', []);
    }

    public function privacy()
    {
        return view('legal.privacy-policy', []);
    }

    public function impressum()
    {
        return view('legal.impressum', []);
    }

    public function php()
    {
        $output = phpinfo();

        return view('xdebug', [
            'output' => $output,
        ]);
    }

    public function correctMyEnglish()
    {
        return view('pages.correct-my-english', []);
    }

    public function ieltsEssayGrader()
    {
        if (auth()->check()) {
            return redirect()
                ->route('dashboard.exam-prep.ielts.writing.submit', 
                ['locale' => session('locale', 'en')]);
        }        
        $product = Product::find(5001);
        return view('pages.tools.ielts-essay-grader', compact('product'));
    }

    public function ieltsEssayFeedback($feedback)
    {
        return view('pages.tools.ielts-essay-feedback', compact('feedback'));
    }

    public function advancedEssayGrader()
    {
        if (auth()->check()) {
            return redirect()
                ->route(
                'dashboard.exam-prep.cambridge.writing.submit',
                    ['locale' => session('locale', 'en')]
                );
        }        
        $product = Product::find(1001);
        return view('pages.tools.c1-advanced-essay-grader', compact('product'));
    }

    public function advancedEssayFeedback($feedback)
    {
        return view('pages.tools.c1-advanced-essay-feedback', compact('feedback'));
    }

    public function proficiencyEssayGrader()
    {
        if (auth()->check()) {
            return redirect()
                ->route(
                    'dashboard.exam-prep.cambridge.writing.submit',
                    ['locale' => session('locale', 'en')]
                );
        }    
        $product = Product::find(1001);
        return view('pages.tools.proficiency-essay-grader', compact('product'));
    }

    public function firstEssayGrader()
    {
        if (auth()->check()) {
            return redirect()
                ->route(
                    'dashboard.exam-prep.cambridge.writing.submit',
                    ['locale' => session('locale', 'en')]
                );
        }    
        $product = Product::find(1001);
        return view('pages.tools.first-essay-grader', compact('product'));
    }

    public function pteEssayGrader()
    {
        $product = Product::find(1001);
        return view('pages.tools.pte-essay-grader', compact('product'));
    }

    public function ieltsWritingInfoShow()
    {
        $course = Course::findOrFail(1501);
        return view('pages.sales.ielts-info', compact('course'));
    }

    public function ieltsWritingVideoShow()
    {
        $course = Course::findOrFail(1501);
        return view('pages.sales.ielts-video', compact('course'));
    }

    public function eliteMastermindOptin()
    {
        return view('pages.squeeze.elite-mastermind-optin');
    }

    public function submitMastermindWaitingListForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'first-name' => 'required|string|max:255',
            'last-name' => 'required|string|max:255',
            'email' => 'required|email',
            'location' => 'required|string|max:255',
            'native-language' => 'required|string|max:255',
            'target-language' => 'required|string|max:255',
            'motivation' => 'required|string',
        ]);

        // Send the email
        Mail::to('lucas@weaverschool.com')->cc($validatedData['email'])->send(new MastermindWaitingListRequest($validatedData));

        // Redirect the user back with a success message
        return back()->with('success', 'You have successfully joined the waiting list!');
    }

    public function ieltsFlashcardsOptin()
    {
        $flashcardSetGroup = FlashcardSetGroup::find(102);
        return view('pages.squeeze.ielts-flashcards-optin', compact('flashcardSetGroup'));
    }

    public function ieltsCoachInfo()
    {
        $product = Product::find(5001);
        return view('exam-prep.ielts-coach.info', compact('product'));
    }

    public function ieltsSpeakingCoachInfo()
    {
        $product = Product::find(5001);
        return view('exam-prep.ielts-coach.speaking.info', compact('product'));
    }

    public function ieltsSpeakingTestsPublicIndex()
    {
        $tests = SpeakingPracticeTest::where('type', 'IELTS')->get();
        return view('exam-prep.ielts-coach.speaking.index', compact('tests'));
    }

    public function cambridgeCoachInfo()
    {
        $product = Product::find(5001);
        return view('exam-prep.cambridge-coach.info', compact('product'));
    }
//
//    public function ieltsFlashcardsAccess()
//    {
//        $flashcardSetGroup = FlashcardSetGroup::find(102);
//        return view('pages.squeeze.ielts-flashcards-access', compact('flashcardSetGroup'));
//    }
}
