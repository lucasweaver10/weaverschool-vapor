<x-layouts.app>
  <x-slot name="title">
      @lang('pages/english-courses.title')
  </x-slot>
  <x-slot name="description">
      @lang('pages/english-courses.title')
  </x-slot>

  {{-- <x-heroes.english-courses /> --}}

  <div class="grid grid-cols-1 mb-5 py-16 lg:py-8 px-16 lg:px-80 bg-blue-400">
    <div class="text-white">
      <h1 class="text-center font-extrabold">
          @lang('pages/english-courses.courses_designed_heading')
      </h1>
      <p class="lead">@lang('pages/english-courses.courses_designed_text')
      </p>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/english-courses.private_lessons_heading')
      </h2>
      <p>
          @lang('pages/english-courses.private_lessons_text')
      </p>
      <p>
        <strong>@lang('pages/english-courses.courses_include')</strong>
        <li>@lang('pages/english-courses.private_bullet_one')</li>
        <li>@lang('pages/english-courses.private_bullet_two')</li>
        <li>@lang('pages/english-courses.private_bullet_three')</li>
        <li>@lang('pages/english-courses.private_bullet_four')</li>
      </p>
      <a href="english/private-lessons" class="unstyled w-48 flex items-center justify-center px-5 py-3 mb-5 md:mb-0 border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-2 md:px-5">
          @lang('pages/english-courses.view_lessons_button')
      </a>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-6.jpg') }}" class="h-full w-full object-center object-cover" alt="private online English lessons">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/english-courses.group_courses_title')
      </h2>
      <p>
          @lang('pages/english-courses.group_courses_text_1')
      </p>
      <p>
          @lang('pages/english-courses.group_courses_text_2')
      </p>
      <a href="english/group-courses" class="unstyled w-48 flex items-center justify-center px-5 py-3 mb-5 md:mb-0 border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-2 md:px-5">
          @lang('pages/english-courses.view_courses_button_2')
      </a>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-3.jpg') }}" class="h-full object-center object-cover" alt="group online english courses">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/english-courses.real_life_skills_title')
      </h2>
      <p>
          @lang('pages/english-courses.real_life_skills_text')
      </p>
      <h2 class="font-extrabold">
          @lang('pages/english-courses.learn_grammar_title')
      </h2>
      <p>
          @lang('pages/english-courses.learn_grammar_text')
      </p>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-5.jpg') }}" class="h-full object-center object-cover" alt="english course skills">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/english-courses.speak_english_title')
      </h2>
      <p>
          @lang('pages/english-courses.speak_english_text')
      </p>
      <h2 class="font-extrabold">
          @lang('pages/english-courses.write_english_title')
      </h2>
      <p>
          @lang('pages/english-courses.write_english_text')
      </p>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-1.png') }}" class="h-full object-center object-cover" alt="improve speaking with online english course">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/english-courses.read_faster_title')
      </h2>
      <p>
          @lang('pages/english-courses.read_faster_text_1')
      </p>
      <p>
          @lang('pages/english-courses.read_faster_text_2')
      </p>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-2.jpg') }}" class="object-center object-cover" alt="online english lessons for reading improvement">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/english-courses.why_different_title')
      </h2>
      <p>
          @lang('pages/english-courses.why_different_text_1')
      </p>
      <p>
          @lang('pages/english-courses.why_different_text_2')
      </p>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online_english_lessons_netherlands.jpg') }}" class="object-center object-cover" alt="why our online english courses are different">
    </div>
  </div>

<div class="container bg-white">
  {{-- <div class="row pb-5 justify-content-center">
    <div class="card-deck justify-content-center">
@foreach($courses as $course)
      <div class="col-lg-4 col-md-10 col-sm-10 no-gutters my-3">
        <div class="card courses-page-card">
        <img src="{{ $course->image }}" class="card-img-top" alt="The Weaver School general english course in rotterdam">
            <div class="card-body text-center">
              <h4 class="card-title">{{ $course->name }}</h4>
              <hr>
              <p class="card-text">{{ $course->description }}</p>
            </div>
            <div class="card-footer">
              <a href="/courses/{{ $course->id }}" class="btn btn-lg btn-primary btn-block">View Course</a>
            </div>
        </div>
      </div>
@endforeach
    </div>
  </div> --}}

  <!-- CTA -->
  @if (Auth::check())
    <x-cta.user />
  @else
    <x-cta.visitor />
  @endif
  <!-- End CTA -->

</div>

</x-layouts.app>
