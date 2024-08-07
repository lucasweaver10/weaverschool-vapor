<x-layouts.app>
  <x-slot name="title">
    @lang('languages/english.title')
  </x-slot>
  <x-slot name="description">
    @lang('languages/english.meta')
  </x-slot>

{{-- <x-heroes.english /> --}}

<div class="bg-blue-400">
  <div class="max-w-2xl mx-auto pt-5 pb-0 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-0">
    <div class="row">
        <div class="col-lg-3 col-sm-12 text-white">
          <h2>@lang('languages/english.premium_courses_title')</h2>
          <p class="lead">@lang('languages/english.premium_courses_text')</p>
        </div>
        <div class="col-lg-9 col-sm-12 col-md-12">
          <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
              <div class="group relative">
                <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                  <img src="{{ asset('/images/private-in-person-english-lessons.jpg') }}" class="w-full h-full object-center object-cover" alt="private lessons The Weaver School">
                </div>
                <div class="text-white mt-4">
                  <h3 class="">@lang('languages/english.business_english_title')</h3>
                  <p class="">@lang('languages/english.business_english_text')</p>
                </div>
                <div class="mt-4">
                  <a href="/private-lessons" class="btn btn-lg btn-light mb-5">@lang('languages/english.private_lessons_button')</a>
                </div>
              </div>
            </div>
            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
              <div class="group relative">
                <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                  <img src="{{ asset('/images/online-lesson-3.jpg') }}" class="w-full h-full object-center object-cover" alt="ielts courses rotterdam">
                </div>
                <div class="text-white mt-4">
                  <h3 class="card-title">@lang('languages/english.exam_prep_title')</h3>
                  <p class="card-text">@lang('languages/english.exam_prep_text')</p>
                </div>
                <div class="mt-4">
                  <a href="/private-lessons" class="btn btn-lg btn-light mb-5">@lang('languages/english.ielts_button')</a>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  {{-- <div class="row text-center mt-5">
      <div class="col justify-content-center">
          <h2>@lang('languages/english.video_title')</h2>
          <p class="lead">@lang('languages/english.video_subtitle')</p>
      </div>
  </div>
  <div class="row text-center">
    <div class="col-2">
    </div>
      <div class="col-lg-8 col-md-12 mt-2 mb-5 justify-content-center">
        <div class="rounded-lg embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/318047417" width="640" height="360" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col-2">
      </div>
  </div> --}}

  <div class="row mt-5 mb-5">
    <div class="col-lg-3 col-sm-12">
      <h2>@lang('languages/english.why_weaver_title')</h2>
      <p class="lead">@lang('languages/english.why_weaver_text')</p>
    </div>
    <div class="col-lg-9 col-sm-12">
      <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
        <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
          <div class="group relative">
            <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
              <img src="{{ asset('/images/online-lesson-4.jpg') }}" class="w-full h-full object-center object-cover" alt="private lessons The Weaver School">
            </div>
            <div class="mt-4">
              <h3 class="">@lang('languages/english.flexible_schedules_title')</h3>
              <p class="">@lang('languages/english.flexible_schedules_text')</p>
            </div>
          </div>
        </div>
        <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
          <div class="group relative">
            <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
              <img src="{{ asset('/images/private_corporate_english_lessons.jpg') }}" class="w-full h-full object-center object-cover" alt="ielts courses rotterdam">
            </div>
            <div class="mt-4">
              <h3 class="card-title">@lang('languages/english.convenient_location_title')</h3>
              <p class="card-text">@lang('languages/english.convenient_location_text')</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="section bg-blue-400">
    <div class="container py-2 px-3">
      <div class="row my-5">
          <div class="col-lg-5 col-sm-12 order-1 order-md-0 text-white">
            <h2>@lang('languages/english.easy_lessons_title')</h2>
            <p class="lead my-3">@lang('languages/english.easy_lessons_text')</p>
            @if (Auth::check())
            <a href="/dashboard" class="btn btn-lg btn-light mt-2">@lang('languages/english.easy_lessons_button_user')</a>
            @else
            <a href="/register" class="btn btn-lg btn-light mt-2">@lang('languages/english.easy_lessons_button_visitor')</a>
            @endif
          </div>
          <div class="col-lg-7 col-sm-12 col-md-12 order-0 order-md-1">
            <img src="{{ asset('/images/english_lessons_easy.png') }}" class="mx-auto mb-4 mb-md-0" style="border: 1px; border-radius: 5px; max-width: 100%;" alt="private lessons The Weaver School">
        </div>
      </div>
    </div>
  </div>

    @component('components.testimonial')
    @endcomponent

    @if (Auth::check())
      <x-cta.user />
    @else
      <x-cta.visitor />
    @endif

</div>

{{-- @endsection --}}
</x-layouts.app>
