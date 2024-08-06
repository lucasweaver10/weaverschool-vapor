<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Plan;
use App\Models\PrivateLesson;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Vimeo\Vimeo;


class CoursesController extends Controller
{
  public function index(Course $course)
  {
    $courses = Course::where('available', 1)->where('subcategory_id', 1)->get();

    return view('courses.english.index', compact('courses'));
  }

  public function thaiIndex(Course $course)
  {
    $courses = Course::where('available', 1)->where('subcategory_id', 3)->get();

    return view('courses.thai.index', compact('courses'));
  }

  public function thaiTravelShow()
  {
      $course = Course::findOrFail(4001);
      return view('courses.thai.travel.show', compact('course'));
  }

  public function show($locale, $subcategory, $slug)
  {
      $subcategory = ucfirst($subcategory);
      $course = Course::where('slug', $slug)
          ->whereHas('subcategory', function ($query) use ($subcategory) {
              $query->where('name', $subcategory);
          })
          ->first();

      if (!$course) {
          // Handle the error, e.g., redirect to a 404 page or show an error message
          abort(404, 'Sorry, that course seems to have moved.');
      }

      if($course->promoVideos->count() > 0) {
          $client = new Vimeo(
              config('services.vimeo.client_id'),
              config('services.vimeo.client_secret'),
              config('services.vimeo.access_token')
          );

          $thumbnails = [];
          foreach($course->promovideos as $video) {
              $response = $client->request('/videos/' . $video->vimeo_video_id . '/pictures', array(), 'GET');
              $thumbnail = $response['body']['data'][0]['sizes'][2]['link'];
              $thumbnails[] = $thumbnail;
          }
      } else {
            $thumbnails = [];
      }

      return view('courses.show', [
          'course' => $course,
          'thumbnails' => $thumbnails,
      ]);
  }

  public function create(Course $course, Plan $plan)
  {
    abort_unless(env('APP_ENV') == 'local', 403);

    $plans = Plan::all();

    return view('courses.create', ['plans' => $plans]);
  }

  public function store(Course $course, Request $request)
  {
    $attributes = request()->validate([
      'name' => 'required',
      'description' => 'required',
      'about' => 'nullable',
      'subject' => 'required',
      'experience' => 'required',
      'level' => 'required',
      'price' => 'required',
      'teacher_id' => 'nullable',
      'lesson_plan_id' => 'nullable',
      'image' => 'nullable',
      'video' => 'nullable',
      'focus' => 'nullable',
      'day' => 'nullable',
      'weekly_lessons' => 'nullable',
      'total_lessons' => 'nullable',
      'lesson_hours' => 'nullable',
      'weekly_hours' => 'nullable',
      'total_hours' => 'nullable',
      'total_weeks' => 'nullable',
      'audience' => 'nullable',
      'max_size' => 'nullable',
      'time' => 'nullable',
      'start_date' => 'nullable',
      'end_date' => 'nullable'
    ]);

    $course = Course::create($attributes);

    $plans = request('plan_id');

    $course->plans()->sync($plans);



    return redirect('/courses');
  }

  public function edit(Course $course)
  {
    abort_unless(env('APP_ENV') == 'local', 403);

    return view('courses.edit', compact('course'));
  }

  public function update(course $course, Request $request)
  {
    $course->update(
      $this->validateCourse()
    );

    $course->addMediaFromRequest('image')
      ->withResponsiveImages()
      ->toMediaCollection('$course->name');

    return redirect('/courses');
  }

  public function destroy(course $course)
  {
    $course->delete();
    return redirect('/courses');
  }

  protected function validateCourse()
  {
    return request()->validate([
      'name' => 'required',
      'description' => 'required',
      'price' => 'required',
      'day' => 'required',
      'size' => 'required',
      'time' => 'required',
      'length' => 'required',
      'image' => 'nullable'
    ]);
  }

    public function getLessonThumbnail($courseId, $lessonId)
    {
        $course = Course::findOrFail($courseId);
        $video = $course->lesson_videos->where('lesson_id', $lessonId)->first();

        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }
        $client = new Vimeo(
            config('services.vimeo.client_id'),
            config('services.vimeo.client_secret'),
            config('services.vimeo.access_token')
        );
        $response = $client->request('/videos/' . $video->vimeo_video_id . '/pictures', [], 'GET');
        $thumbnail = $response['body']['data'][0]['sizes'][2]['link'];

        return response()->json(['thumbnail' => $thumbnail]);
    }

}
