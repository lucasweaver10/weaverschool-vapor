<!-- This example requires Tailwind CSS v2.0+ -->
@php $locale = App::getLocale(); @endphp
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
      <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
             fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
          {{-- <polygon points="50,0 100,0 50,100 0,100" /> --}}
        </svg>

        {{-- <div>
          <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
          </div>

          <!--
            Mobile menu, show/hide based on menu open state.

            Entering: "duration-150 ease-out"
              From: "opacity-0 scale-95"
              To: "opacity-100 scale-100"
            Leaving: "duration-100 ease-in"
              From: "opacity-100 scale-100"
              To: "opacity-0 scale-95"
          -->

        </div> --}}

        <main class="mt-0 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
          <div class="sm:text-center lg:text-left pt-5 mr-8">
            <h1 class="text-6xl tracking-tight font-semibold text-gray-900 sm:text-5xl md:text-6xl">
              <span class="block xl:inline">@lang('pages/welcome.heading_1')</span>
              <span class="block text-blue-400 xl:inline">@lang('pages/welcome.heading_2')</span>
            </h1>
            <div class="mt-3 text-2xl sm:mt-5  sm:max-w-xl sm:mx-auto md:mt-5 lg:mx-0">
                @lang('pages/welcome.subheading')
            </div>
            <div class="bg-gray-100 rounded-lg px-4 py-8 mt-8 shadow-sm">
                <div x-data="{ language: 'english' }" class="sm:justify-center lg:justify-start">
                    <div class="">
                        <label for="language" class="block mb-2 text-md font-medium leading-6 text-gray-900">Choose your language</label>
                        <select x-model="language" id="language" class="mt-2 block w-full rounded-md border-0 py-5 pl-5 pr-10
                        text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-blue-400 sm:text-xl sm:leading-6">
                            <option value="english" selected>English</option>
                            <option value="thai">Thai</option>
                        </select>
                    </div>
                    <div class="rounded-md mt-3 sm:mt-0">
                        <a :href="'/' + '{{ session('locale') }}' + '/' + language + '/courses/online'" class="shadow-md w-full flex items-center
                        justify-center px-8 py-3 mt-4 sm:mt-8 bg-blue-400 text-base font-medium rounded-md text-white
                        hover:bg-blue-300 py-5 md:py-4 md:text-lg md:px-10">
                            @lang('pages/welcome.view_lessons_button')
                        </a>
                    </div>
                </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
      <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
           src="{{ asset('/images/pages/online-language-courses.jpg') }}" alt="online language courses">
    </div>
  </div>
