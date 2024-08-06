<x-layouts.app>
  <x-slot name="title">
      @lang('pages/learn-english.title')
  </x-slot>
  <x-slot name="description">
      @lang('pages/learn-english.meta')
  </x-slot>

  <x-heroes.learn-english />

  <div class="grid grid-cols-1 mb-5 py-16 lg:py-8 px-16 lg:px-80 bg-blue-400">
    <div class="text-white">
      <h1 class="text-center font-extrabold">
          @lang('pages/learn-english.learn_english_heading')
      </h1>
      <p class="lead">@lang('pages/learn-english.learn_english_text_1')</p>
      <p class="lead">@lang('pages/learn-english.learn_english_text_2')</p>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/learn-english.how_to_learn_title')
      </h2>
      <p>
          @lang('pages/learn-english.how_to_learn_text_1')
      </p>
      <p>
          @lang('pages/learn-english.how_to_learn_text_2')
      </p>
      <p>
          @lang('pages/learn-english.how_to_learn_text_3')
      </p>
      <p>
          @lang('pages/learn-english.how_to_learn_text_4')
      </p>
      <a href="english/private-lessons" class="unstyled w-48 flex items-center justify-center px-5 py-3 mb-5 md:mb-0
      border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-2 md:px-5">
          @lang('pages/learn-english.view_lessons_button_2')
      </a>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-6.jpg') }}" class="h-full w-full object-center object-cover"
           alt="private English lessons">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/learn-english.most_important_title')
      </h2>
      <p>
          @lang('pages/learn-english.most_important_text_1')
      </p>
      <p>
          @lang('pages/learn-english.most_important_text_2')
      </p>
      <p>
          @lang('pages/learn-english.most_important_text_3')
      </p>
      <a href="english/group-courses" class="unstyled w-48 flex items-center justify-center px-5 py-3 mb-5 md:mb-0
      border border-transparent text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-2 md:px-5">
          @lang('pages/learn-english.view_courses_button')
      </a>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-3.jpg') }}" class="h-full object-center object-cover" alt="group english courses">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/learn-english.motivation_title')
      </h2>
      <p>
          @lang('pages/learn-english.motivation_text_1')
      </p>
      <p>
          @lang('pages/learn-english.motivation_text_2')
      </p>
      <p>
          @lang('pages/learn-english.motivation_text_3')
      </p>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-5.jpg') }}" class="h-full object-center object-cover"
           alt="english course skills">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/learn-english.private_lessons_title')
      </h2>
      <p>
          @lang('pages/learn-english.private_lessons_text_1')
      </p>
      <p>
          @lang('pages/learn-english.private_lessons_text_2')
      </p>
      <h2 class="font-extrabold">
          @lang('pages/learn-english.english_courses_title')
      </h2>
      <p>
          @lang('pages/learn-english.english_courses_text_1')
      </p>
      <p>
          @lang('pages/learn-english.english_courses_text_2')
      </p>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online-lesson-1.png') }}" class="h-full object-center object-cover"
           alt="improve speaking with english course">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/learn-english.in_company_private_title')
      </h2>
      <p>
          @lang('pages/learn-english.in_company_private_text_1')
      </p>
      <p>
          @lang('pages/learn-english.in_company_private_text_2')
      </p>
      <h2 class="font-extrabold">
          @lang('pages/learn-english.in_company_courses_title')
      </h2>
      <p>
          @lang('pages/learn-english.in_company_courses_text_1')
      </p>
      <p>
          @lang('pages/learn-english.in_company_courses_text_2')
      </p>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/private_corporate_english_lessons.jpg') }}" class="object-center object-cover"
           alt="english course for reading improvement">
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 my-5 mx-24">
    <div class="lg:mr-16">
      <h2 class="font-extrabold">
          @lang('pages/learn-english.where_learn_title')
      </h2>
      <p>
          @lang('pages/learn-english.where_learn_text_1')
      </p>
      <p>
          @lang('pages/learn-english.where_learn_text_3')
      </p>
    </div>
    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
      <img src="{{ asset('/images/online_english_lessons_netherlands.jpg') }}" class="object-center object-cover"
           alt="why our english courses are different">
    </div>
  </div>

<div class="container bg-white">

  <!-- CTA -->
  @if (Auth::check())
    <x-cta.user />
  @else
    <x-cta.visitor />
  @endif
  <!-- End CTA -->

</div>

</x-layouts.app>
