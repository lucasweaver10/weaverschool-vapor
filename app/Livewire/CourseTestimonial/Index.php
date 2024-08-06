<?php

namespace App\Livewire\CourseTestimonial;

use App\Models\Testimonial;
use Livewire\Component;

class Index extends Component
{
    public $testimonials;
    public $courseId;

    public function mount($courseId)
    {
        $this->testimonials = Testimonial::where('course_id', $courseId)->inRandomOrder()->take(3)->get();
    }

    public function viewAll()
    {
        $this->testimonials = Testimonial::where('course_id', $this->courseId)->get();
        $this->dispatch('refresh');
    }

    public function render()
    {
        $testimonials = $this->testimonials;
        return view('livewire.course-testimonial.index', ['testimonials' => $testimonials]);
    }
}
