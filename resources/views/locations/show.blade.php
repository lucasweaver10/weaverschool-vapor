<x-layouts.app>
  <x-slot name="title">
    English Courses in {{ $location->name }} | The Weaver School
  </x-slot>
  <x-slot name="description">
    English courses in {{ $location->name }} to help you become comfortable and confident using English."
  </x-slot>

<div class="container bg-white">
  <div class="row justify-content-center pt-3">
    <div class="col-lg-12 text-center">
      <h1>@lang('locations/rotterdam.heading', ['city' => $location->name])</h1>
      <p class="lead">@lang('locations/rotterdam.subheading', ['city' => $location->name ])</p>
    </div>
  </div>
  <div class="row justify-content-center mt-2 mt-lg-3">
    <div class="col-lg-6 col-sm-12 order-1 order-lg-0">
      <h2>@lang('locations/rotterdam.english_courses_title')</h2>
      <p>@lang('locations/rotterdam.english_courses_text', [ 'City' => $location->name ])</p>
    </div>
    <div class="col-lg-6 col-sm-12 order-0 order-lg-1">
      <div class="card mt-2 mb-4">
        <img src="{{ asset('/images/english-courses-weaver-english-hero.jpg') }}" class="card-img-top about-image" alt="rotterdam english courses">
      </div>
    </div>
  </div>

  <div class="row justify-content-center mt-4 mt-lg-5">
    <div class="col-lg-6 col-sm-12 order-0 order-lg-0">
      <div class="card mt-0 mt-lg-2 mb-4">
        <img src="/images/relevant course content.jpeg" class="card-img-top about-image" alt="group english courses rotterdam">
      </div>
    </div>
    <div class="col-lg-6 col-sm-12 order-1 order-lg-1">
      <h2>@lang('locations/rotterdam.group_courses_title', ['City' => $location->name])</h2>
      <p>@lang('locations/rotterdam.group_courses_text')</p>
      <ul>
        <li>@lang('locations/rotterdam.group_courses_bullet_one')</li>
        <li>@lang('locations/rotterdam.group_courses_bullet_two')</li>
        <li>@lang('locations/rotterdam.group_courses_bullet_three')</li>
        <li>@lang('locations/rotterdam.group_courses_bullet_four')</li>
        <li>@lang('locations/rotterdam.group_courses_bullet_five')</li>
    </div>
    <div class="col-lg-6 order-lg-2">
    </div>
    <div class="col-lg-6 order-2 order-lg-3">
      <a href="/courses" class="btn btn-light btn-lg mb-2 mr-1">@lang('locations/rotterdam.view_courses_button')</a>
      <a href="#exampleModal" class="btn btn-primary btn-lg mb-2" data-toggle="modal">@lang('locations/rotterdam.request_information_button')</a>
    </div>
  </div>

  <div class="row justify-content-center mt-4 mt-lg-5">
    <div class="col-lg-6 order-1 order-lg-0">
      <h2>@lang('locations/rotterdam.academic_courses_title', ['City' => $location->name])</h2>
      <p>@lang('locations/rotterdam.academic_courses_text')</p>
      <ul>
        <li>@lang('locations/rotterdam.academic_courses_bullet')</li>
    </div>
    <div class="col-lg-6 order-0 order-lg-1">
      <div class="card mt-2 mb-4">
        <img src="/images/about The Weaver School hero.jpeg" class="card-img-top about-image" alt="ielts english course rotterdam">
      </div>
    </div>
    <div class="col-lg-6 order-2 order-lg-2">
      <a href="/courses" class="btn btn-light btn-lg mb-2 mr-1">@lang('locations/rotterdam.view_courses_button')</a>
      <a href="#exampleModal" class="btn btn-primary btn-lg mb-2" data-toggle="modal">Request Information</a>
    </div>
    <div class="col-lg-6 order-3">
    </div>
  </div>

  <div class="row justify-content-center mt-4 mt-lg-5">
    <div class="col-lg-6 col-sm-12 order-0 order-lg-0">
      <div class="card mt-0 mt-lg-2 mb-4">
        <img src="{{ asset('/images/online-lesson-2.jpg') }}" class="card-img-top about-image" alt="online english courses rotterdam">
      </div>
    </div>
    <div class="col-lg-6 col-sm-12 order-1 order-lg-1">
      <h2>@lang('locations/rotterdam.online_courses_title')</h2>
      <p>@lang('locations/rotterdam.online_courses_text')</p>
      <ul>
        <li>@lang('locations/rotterdam.online_courses_bullet_one')</li>
        <li>@lang('locations/rotterdam.online_courses_bullet_two')</li>
        <li>@lang('locations/rotterdam.online_courses_bullet_three')</li>
        <li>@lang('locations/rotterdam.online_courses_bullet_four')</li>
        <li>@lang('locations/rotterdam.online_courses_bullet_five')</li>
    </div>
    <div class="col-lg-6 order-lg-2">
    </div>
    <div class="col-lg-6 order-2 order-lg-3">
      <a href="/online-courses" class="btn btn-light btn-lg mb-2 mr-1">@lang('locations/rotterdam.view_courses_button')</a>
      <a href="#exampleModal" class="btn btn-primary btn-lg mb-2" data-toggle="modal">@lang('locations/rotterdam.request_information_button')</a>
    </div>
  </div>

  <div class="row justify-content-center mt-4 mt-lg-5">
    <div class="col-lg-6 order-1 order-lg-0">
      <h2>@lang('locations/rotterdam.private_lessons_title', ['City' => $location->name])</h2>
      <p>@lang('locations/rotterdam.private_lessons_text')</p>
    </div>
    <div class="col-lg-6 order-0 order-lg-1">
      <div class="card mt-2 mb-4">
        <img src="{{ asset('/images/weaver-english-private-lessons-card.jpg') }}" class="card-img-top about-image" alt="private english lessons rotterdam">
      </div>
    </div>
    <div class="col-lg-6 order-2 order-lg-2">
      <a href="/private-lessons" class="btn btn-light btn-lg mb-2 mr-1">@lang('locations/rotterdam.view_lessons_button')</a>
      <a href="#exampleModal" class="btn btn-primary btn-lg mb-2" data-toggle="modal">@lang('locations/rotterdam.request_information_button')</a>
    </div>
    <div class="col-lg-6 order-3">
    </div>
  </div>

  <div class="row justify-content-center mt-4 mt-lg-5">
    <div class="col-lg-6 col-sm-12 order-0 order-lg-0">
      <div class="card mt-0 mt-lg-2 mb-4">
        <img src="/images/logos/The Weaver School in-company courses full.jpeg" class="card-img-top about-image" alt="Rotterdam corporate english lessons">
      </div>
    </div>
    <div class="col-lg-6 col-sm-12 order-1 order-lg-1">
      <h2>@lang('locations/rotterdam.corporate_courses_title', ['City' => $location->name])</h2>
      <p>@lang('locations/rotterdam.corporate_courses_text')</p>
    </div>
    <div class="col-lg-6 order-lg-2">
    </div>
    <div class="col-lg-6 order-2 order-lg-3">
      <a href="/courses/1401" class="btn btn-light btn-lg mb-2 mr-1">@lang('locations/rotterdam.view_course_button')</a>
      <a href="#exampleModal" class="btn btn-primary btn-lg mb-2" data-toggle="modal">@lang('locations/rotterdam.request_information_button')</a>
    </div>
  </div>

  <div class="row my-5 align-content-center">
    <div class="col">
      <h2>@lang('locations/rotterdam.location')</h2>
      <p>@lang('locations/rotterdam.location_text', ['blurb' => $location->blurb])</p>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12">
      <div class="card-deck">
        <div class="card card-img g-map embed-responsive" alt="rotterdam english course location" style="width: 26rem; height: 22rem;">
                <iframe src="{{ $location->map_url }}"
                width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
  <!-- CTA -->
  @component ('components.cta')
  @endcomponent
  <!-- End CTA -->
  <!-- Modal -->
  @component ('components.modal', [
      'courses' => $courses,
      'privateLessons' => $privateLessons,
      ])
  @endcomponent
  <!-- End Modal -->



</div>

</x-layouts.app>
