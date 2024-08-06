<x-layouts.app title="Online English courses | The Weaver School">
  <x-slot name="title">
    Online English courses | The Weaver School
  </x-slot>
  <x-slot name="description">
    Online English courses to reach English fluency fast.
  </x-slot>
<x-layouts.guest>

<x-heroes.courses.english.index />

<!-- Courses block -->
<div class="py-24 px-8 bg-gray-200" id="courses">
    <livewire:course-grid-index :courses="$courses"/>
</div>
<!-- End courses block -->

<div class="bg-white pt-12 sm:pt-24 pb-8 sm:pb-12">
  <div class="max-w-2xl mx-auto pt-5 pb-0 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
      <div class="text-center text-black mb-12 lg:mx-64">
          <h2 class="text-5xl tracking-tight font-extrabold">@lang('courses/english/index.become_fluent')</h2>
          {{-- <p class="text-2xl">@lang('courses/english/index.subheading')</p> --}}
      </div>
  </div>
  <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl md:px-0 lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">

      <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
          <div class="group relative">
            <div class="">
              <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto w-12 h-12">
               <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
             </svg>
            </div>
              <div class="text-black my-16 lg:my-4 px-8 sm:px-0">
                  <h3 class="text-3xl tracking-tight font-extrabold text-center">@lang('courses/english/index.vocabulary_title')</h3>
                  <p class="text-xl text-center">
                      @lang('courses/english/index.vocabulary_text')
                  </p>
              </div>
          </div>
      </div>

      <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
          <div class="group relative">
            <div class="">
              <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto w-12 h-12">
               <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
             </svg>
            </div>
              <div class="text-black mb-16 lg:my-4 px-8 sm:px-0">
                  <h3 class="text-3xl tracking-tight font-extrabold text-center"> @lang('courses/english/index.speaking_title')</h3>
                  <p class="text-xl text-center">
                      @lang('courses/english/index.speaking_text')
                  </p>
              </div>
          </div>
      </div>

      <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
          <div class="group relative">
              <div class="">
                  <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto w-12 h-12">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
              </div>
              <div class="text-black my-16 lg:my-4 px-8 sm:px-0">
                  <h3 class="text-3xl tracking-tight font-extrabold text-center">@lang('courses/english/index.grammar_title')</h3>
                  <p class="text-xl text-center">
                      @lang('courses/english/index.grammar_text')
                  </p>
              </div>
          </div>
      </div>

  </div>
</div>

<!-- We focus on -->

<div x-data="{ active: 1 }" class="max-w-2xl mx-auto sm:pt-16 pb-12 sm:pb-24 px-8 sm:px-6 md:px-4 lg:px-8 lg:max-w-7xl lg:grid
    lg:grid-cols-2 lg:gap-x-8">
  <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
      <div class="group relative">
          <h2 class="text-5xl tracking-tight font-extrabold mb-4">@lang('courses/english/index.how_we_do_it_title')</h2>

      <div class="mx-auto max-w-3xl w-full min-h-[16rem] space-y-4">
        <div x-data="{
            id: 1,
            get expanded() {
                return this.active === this.id
            },
            set expanded(value) {
                this.active = value ? this.id : null
            },
        }" x-cloak role="region" class="rounded-lg bg-white shadow">
            <h2>
                <button
                    x-on:click="expanded = !expanded"
                    :aria-expanded="expanded"
                    class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
                >
                    <span class="text-left">@lang('courses/english/index.hwdi_1')</span>
                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                </button>
            </h2>

            <div x-show="expanded" x-collapse>
                <div class="px-6 pb-4">@lang('courses/english/index.hwdi_answer_1')</div>
            </div>
        </div>

        <div x-data="{
            id: 2,
            get expanded() {
                return this.active === this.id
            },
            set expanded(value) {
                this.active = value ? this.id : null
            },
        }" role="region" class="rounded-lg bg-white shadow">
            <h2>
                <button
                    x-on:click="expanded = !expanded"
                    :aria-expanded="expanded"
                    class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
                >
                    <span class="text-left">@lang('courses/english/index.hwdi_2')</span>
                    <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                    <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                </button>
            </h2>

            <div x-show="expanded" x-collapse>
                <div class="px-6 pb-4">@lang('courses/english/index.hwdi_answer_2')</div>
            </div>
        </div>

        <div x-data="{
          id: 3,
          get expanded() {
              return this.active === this.id
          },
          set expanded(value) {
              this.active = value ? this.id : null
          },
      }" role="region" class="rounded-lg bg-white shadow">
          <h2>
              <button
                  x-on:click="expanded = !expanded"
                  :aria-expanded="expanded"
                  class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
              >
                  <span class="text-left">@lang('courses/english/index.hwdi_3')</span>
                  <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                  <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
              </button>
          </h2>

          <div x-show="expanded" x-collapse>
              <div class="px-6 pb-4">@lang('courses/english/index.hwdi_answer_3')</div>
          </div>
      </div>
      </div>
      </div>
  </div>
  <div class="lg:grid lg:grid-cols-1 lg:gap-y-8 my-12">
      <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
            <img x-cloak x-show="active == 1" src="{{ asset('/images/pages/online-language-lessons.jpg') }}" class="w-full h-full object-center object-cover"
                alt="online English courses">
            <img x-cloak x-show="active == 2" src="{{ asset('/images/pages/online english course homework with feedback.png') }}" class="w-full h-full object-center object-fit"
                alt="online English courses">
            <img x-cloak x-show="active == 3" src="{{ asset('/images/pages/online english class online homework.png') }}" class="w-full h-full object-center object-fit"
                alt="online English courses">
      </div>
  </div>
</div>

<!-- End We focus on -->

<!-- What you'll get -->

  <div x-data="{ active: 1 }" class="bg-gray-200 py-12 sm:py-24">
    <div class="max-w-2xl mx-auto py-12 px-8 sm:px-6 md:px-4 lg:px-8 lg:max-w-7xl  lg:grid lg:grid-cols-2 lg:gap-x-8">
      <div class="lg:grid lg:grid-cols-1 lg:gap-y-8 mb-16">
          <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
                <img x-cloak x-show="active == 1" src="{{ asset('/images/pages/online english class video lesson content.png') }}" class="w-full h-full rounded-lg object-center object-fit"
                    alt="online english class video lesson content">
                <img x-show="active == 2" src="{{ asset('/images/pages/online english class speaking time.jpg') }}" class="w-full h-full rounded-lg object-center object-cover"
                    alt="online english course live speaking practice">
                <img x-show="active == 3" src="{{ asset('/images/pages/online english course weekly quizzes.png') }}" class="w-full h-full rounded-lg object-center object-cover"
                    alt="online English courses The Weaver School">
          </div>
      </div>
      <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
        <div class="group relative">
          <h2 class="text-5xl tracking-tight font-extrabold mb-4">@lang('courses/english/index.what_you_get')</h2>
          <div class="mx-auto max-w-3xl w-full min-h-[16rem] space-y-4">
            <div x-data="{
                id: 1,
                get expanded() {
                    return this.active === this.id
                },
                set expanded(value) {
                    this.active = value ? this.id : null
                },
            }" x-cloak role="region" class="rounded-lg bg-gray-100 shadow">
                <h2>
                    <button
                        x-on:click="expanded = !expanded"
                        :aria-expanded="expanded"
                        class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
                    >
                        <span class="text-left">@lang('courses/english/index.blended_learning_title')</span>
                        <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                        <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                    </button>
                </h2>

                <div x-show="expanded" x-collapse>
                    <div class="px-6 pb-4">@lang('courses/english/index.blended_learning_text')</div>
                </div>
            </div>

            <div x-data="{
                id: 2,
                get expanded() {
                    return this.active === this.id
                },
                set expanded(value) {
                    this.active = value ? this.id : null
                },
            }" role="region" class="rounded-lg bg-gray-100 shadow">
                <h2>
                    <button
                        x-on:click="expanded = !expanded"
                        :aria-expanded="expanded"
                        class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
                    >
                        <span class="text-left">@lang('courses/english/index.more_speaking_title')</span>
                        <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                        <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                    </button>
                </h2>

                <div x-show="expanded" x-collapse>
                    <div class="px-6 pb-4">@lang('courses/english/index.more_speaking_text')</div>
                </div>
            </div>

            <div x-data="{
              id: 3,
              get expanded() {
                  return this.active === this.id
              },
              set expanded(value) {
                  this.active = value ? this.id : null
              },
          }" role="region" class="rounded-lg bg-gray-100 shadow">
              <h2>
                  <button
                      x-on:click="expanded = !expanded"
                      :aria-expanded="expanded"
                      class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold focus:outline-none"
                  >
                      <span class="text-left">@lang('courses/english/index.regular_testing_title')</span>
                      <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                      <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                  </button>
              </h2>

              <div x-show="expanded" x-collapse>
                  <div class="px-6 pb-4">@lang('courses/english/index.regular_testing_text')</div>
              </div>
          </div>

          </div>
          </div>
      </div>
        </div>

</div>

<!-- End What you'll get -->

<!-- Start Our Teachers -->

    <x-carousels.teachers :subcategoryId="1" />

<!-- End our teachers -->

<!-- Our reviews -->
    <div class="bg-teal-500 px-3 py-12 text-white">
        <div class="max-w-4xl mx-auto py-5 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
            <div class="text-3xl font-extrabold tracking-tight text-white sm:text-3xl text-center mb-5">What our students say...</div>
            <x-testimonials.carousel />
        </div>
    </div>
<!-- End our reviews -->

<!-- End how it works -->

<!-- FAQ -->
<div x-data="{ dropdownOneOpen: false, dropdownTwoOpen: false, dropdownThreeOpen: false, dropdownFourOpen: false,
    dropdownFiveOpen: false, dropdownSixOpen: false, dropdownSevenOpen: false}" class="bg-gray-200 pb-5">
  <div class="max-w-2xl text-center lg:mx-48 xl:mx-96 py-24 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
      <h2 class="text-4xl sm:text-5xl font-extrabold text-center mb-16">@lang('courses/english/index.faq_title')</h2>
          <div class="mb-4 pb-4 border-b border-gray-300">
              <button id="faq-course-materials-toggle" class="inline-flex mx-5 md:mx-auto focus:outline-none" @click=" dropdownOneOpen = ! dropdownOneOpen">
                  <svg  class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                  </svg>
                  <h5 class="text-left text-xl sm:text-3xl font-bold">@lang('courses/english/index.faq_heading_1')</h5>
              </button>
              <p class="text-xl sm:text-2xl mt-2 mx-5 md:mx-auto" x-show="dropdownOneOpen">
                  @lang('courses/english/index.faq_text_1')
              </p>
          </div>
      <div class="mb-4 pb-4 border-b border-gray-300">
          <button id="faq-time-needed-toggle" class="inline-flex mx-5 md:mx-auto focus:outline-none" @click=" dropdownTwoOpen = ! dropdownTwoOpen">
              <svg  class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              <h5 class="text-left text-xl sm:text-3xl font-bold">@lang('courses/english/index.faq_heading_2')</h5>
          </button>
          <p class="text-lg sm:text-2xl mt-2 mx-5 md:mx-auto" x-show="dropdownTwoOpen">
              @lang('courses/english/index.faq_text_2')
          </p>
      </div>
      <div class="mb-4 pb-4 border-b border-gray-300">
          <button id="faq-reschedule-lessons-toggle" class="inline-flex mx-5 md:mx-auto focus:outline-none" @click=" dropdownThreeOpen = ! dropdownThreeOpen">
              <svg  class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              <h5 class="text-left text-xl sm:text-3xl font-bold">@lang('courses/english/index.faq_heading_3')</h5>
          </button>
          <p class="text-lg sm:text-2xl mt-2 mx-5 md:mx-auto" x-show="dropdownThreeOpen">
              @lang('courses/english/index.faq_text_3')
          </p>
      </div>
      <div class="mb-4 pb-4 border-b border-gray-300">
          <button id="faq-downloads-needed-toggle" class="inline-flex mx-5 md:mx-auto focus:outline-none" @click=" dropdownFourOpen = ! dropdownFourOpen">
              <svg  class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              <h5 class="text-left text-xl sm:text-3xl font-bold">@lang('courses/english/index.faq_heading_4')</h5>
          </button>
          <p class="text-lg sm:text-2xl mt-2 mx-5 md:mx-auto" x-show="dropdownFourOpen">
              @lang('courses/english/index.faq_text_4')
          </p>
      </div>
      <div class="mb-4 pb-4 border-b border-gray-300">
          <button id="faq-hours-to-fluency-toggle" class="inline-flex mx-5 md:mx-auto focus:outline-none" @click=" dropdownFiveOpen = ! dropdownFiveOpen">
              <svg  class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              <h5 class="text-left text-xl sm:text-3xl font-bold">@lang('courses/english/index.faq_heading_5')</h5>
          </button>
          <p class="text-lg sm:text-2xl mt-2 mx-5 md:mx-auto" x-show="dropdownFiveOpen">
              @lang('courses/english/index.faq_text_5')
          </p>
      </div>
      <div class="mb-4 pb-4 border-b border-gray-300">
          <button id="faq-time-for-homework-toggle" class="inline-flex mx-5 md:mx-auto focus:outline-none" @click=" dropdownSixOpen = ! dropdownSixOpen">
              <svg  class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              <h5 class="text-left text-xl sm:text-3xl font-bold">@lang('courses/english/index.faq_heading_6')</h5>
          </button>
          <p class="text-lg sm:text-2xl mt-2 mx-5 md:mx-auto" x-show="dropdownSixOpen">
              @lang('courses/english/index.faq_text_6')
          </p>
      </div>
      <div class="mb-4 pb-4 border-b border-gray-300">
          <button id="faq-company-payment-toggle" class="inline-flex mx-5 md:mx-auto focus:outline-none" @click=" dropdownSevenOpen = ! dropdownSevenOpen">
              <svg  class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              <h5 class="text-left text-xl sm:text-3xl font-bold">@lang('courses/english/index.faq_heading_7')</h5>
          </button>
          <p class="text-lg sm:text-2xl mt-2 mx-5 md:mx-auto" x-show="dropdownSevenOpen">
              @lang('courses/english/index.faq_text_7')
          </p>
      </div>
  </div>
</div>

<!-- End FAQ -->

@if (Auth::check())
  <x-cta.user />
@else
  <x-cta.visitor />
@endif

</div>
</x-layouts.guest>
</x-layouts.app>
