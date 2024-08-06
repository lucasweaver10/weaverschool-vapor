<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use Vimeo\Vimeo;
use App\Models\Course;
use App\Models\Lesson;

class LessonThumbnail extends Component
{
    public $course;
    public $lesson;
    public $thumbnailUrl = '/images/courses/online english course lesson image placeholder.jpg';

    public function mount($courseId, $lessonId)
    {
        $this->course = Course::findOrFail($courseId);
        $this->lesson = $this->course->lessons->where('id', $lessonId)->first();

        if (!$this->lesson) {
            abort(404, 'Lesson not found');
        }

        // Load the initial thumbnail when the component is mounted
        $this->thumbnailUrl = '/images/courses/online english course lesson image placeholder.jpg';
    }

    public function loadThumbnail()
    {
        $video = $this->course->lesson_videos->where('lesson_id', $this->lesson->id)->first();

        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }

        $client = new Vimeo(config('services.vimeo.client_id'), config('services.vimeo.client_secret'), config('services.vimeo.access_token'));
        $response = $client->request('/videos/' . $video->vimeo_video_id . '/pictures', [], 'GET');
        $this->thumbnailUrl = $response['body']['data'][0]['sizes'][2]['link'];
    }

    public function render()
    {
        return view('livewire.courses.lesson-thumbnail');
    }
}
