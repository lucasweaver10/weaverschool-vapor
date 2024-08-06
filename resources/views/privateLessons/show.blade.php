<x-layouts.app title="{{ $privateLesson->name }} | The Weaver School">
  <x-slot name="title">
    {{ $privateLesson->name }} | The Weaver School
  </x-slot>
  <x-slot name="description">
    {{ $privateLesson->name }} in Rotterdam at The Weaver School
  </x-slot>

    <x-heroes.privateLessons.online.show :privateLesson="$privateLesson" />

<div x-data="{ dropdownOneOpen: false, dropdownTwoOpen: false, dropdownThreeOpen: false, dropdownFourOpen: false,
    dropdownFiveOpen: false, dropdownSixOpen: false, dropdownSevenOpen: false, }">
<div class="container-fluid bg-white">

    <div class="bg-blue-400 pb-5">
        <div class="max-w-2xl mx-auto py-12 pb-0 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
            <div class="text-center text-white mb-5 lg:mx-64">
                <h2 class="text-5xl tracking-tight font-extrabold">Become fluent in English</h2>
                <p class="text-2xl">{{ $privateLesson->about }}</p>
            </div>
        </div>
        <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl md:px-0 lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">

                <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                    <div class="group relative">
{{--                        <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">--}}
{{--                            <img src="{{ asset('/images/online-lesson-4.jpg') }}" class="w-full h-full object-center object-cover"--}}
{{--                                 alt="private lessons The Weaver School">--}}
{{--                        </div>--}}
                        <div class="text-white my-16 lg:my-8 px-8 sm:px-0">
                            <h3 class="text-center text-3xl tracking-tight font-extrabold">Understand grammar & tenses</h3>
                            <p class="text-xl">Using the right tense can be one of the most difficult parts of speaking English.
                                We explain the tenses in a way that's easy to understand so you can finally feel confident
                                using them.
                            </p>
                        </div>
                    </div>
                </div>

            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                <div class="group relative">
{{--                    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">--}}
{{--                        <img src="{{ asset('/images/online-lesson-5.jpg') }}" class="w-full h-full object-center object-cover"--}}
{{--                             alt="private lessons The Weaver School">--}}
{{--                    </div>--}}
                    <div class="text-white my-16 lg:my-8 px-8 sm:px-0">
                        <h3 class="text-center text-3xl tracking-tight font-extrabold">Learn new vocabulary</h3>
                        <p class="text-xl">Do you struggle to find the right words when speaking English? This course focuses
                            on teaching you useful new words that you will use every day.
                        </p>
                    </div>
                </div>
            </div>

            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                <div class="group relative">
{{--                    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">--}}
{{--                        <img src="{{ asset('/images/online-lesson-3.jpg') }}" class="w-full h-full object-center object-cover"--}}
{{--                             alt="private lessons The Weaver School">--}}
{{--                    </div>--}}
                    <div class="text-white my-16 lg:my-8 px-8 sm:px-0">
                        <h3 class="text-center text-3xl tracking-tight font-extrabold">Improve your speaking ability</h3>
                        <p class="text-xl">Practice, practice, practice. That's what we help you do to improve your English
                            speaking skills, build your confidence, and finally feel comfortable speaking English.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="max-w-2xl mx-auto py-5 px-8 sm:px-6 md:px-4 lg:px-8 lg:max-w-7xl  lg:grid lg:grid-cols-2 lg:gap-x-8">
        <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
            <div class="group relative">
                <h2 class="text-5xl tracking-tight font-extrabold mb-4">How it works</h2>
                <p class="text-xl">1. Create your free The Weaver School account so you can access our website.</p>
                <p class="text-xl">2. Register for your preferred course and teacher.</p>
                <p class="text-xl">3. Pay for your course all at once or set up monthly payments.</p>
                <p class="text-xl">4. Schedule your first lesson with your teacher.</p>
                <p class="text-xl">5. Receive your video meeting link that you'll use for the entire course.</p>
                <p class="text-xl">6. Manage your homework and course progress all directly from your Student Dashboard.</p>
                @if (Auth::check())--}}
                    <a href="/dashboard" class="unstyled w-1/2 mt-5 mb-5 sm:mb-0 flex items-center justify-center py-3 border border-transparent
                        text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-4 md:text-lg">
                        @lang('privateLessons/index.create_account_button')
                    </a>
                @else
                    <a href="/register" class="unstyled w-1/2 mt-5 mb-5 sm:mb-0 flex items-center justify-center py-3 border border-transparent
                    text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-300 md:py-4 md:text-lg">
                        @lang('privateLessons/index.create_account_button')
                    </a>
                @endif
            </div>
        </div>
        <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
            <div class="aspect-w-7 rounded-lg overflow-hidden">
                <img src="{{ asset('/images/online_english_lessons_netherlands.jpg') }}" class="object-center object-cover"
                     alt="private lessons The Weaver School">
            </div>
        </div>
    </div>


    <div class="bg-gray-200 pb-5 mb-5">
        <div class="max-w-2xl lg:mx-48 xl:mx-96 pb-0 py-5 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
            <h1 class="text-5xl font-extrabold text-center mb-16">Course FAQ</h1>
                <div class="mb-4 pb-4 border-b border-gray-300">
                    <button class="inline-flex mx-5 md:mx-80" @click=" dropdownOneOpen = ! dropdownOneOpen">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <h5 class="text-left text-3xl font-bold">What course materials do I need?</h5>
                    </button>
                    <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownOneOpen">
                        All you need for this course is a laptop with an internet connection. Headphones and a learning
                         space without distractions are also recommended.
                    </p>
                </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownTwoOpen = ! dropdownTwoOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">How much time do I need per week?</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownTwoOpen">
                    Students usually schedule lessons of 1 or 1.5 hours for each lesson. You'll also need at least 2 hours
                     per week to complete your homework.
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownThreeOpen = ! dropdownThreeOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">Can I reschedule a lesson?</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownThreeOpen">
                    You can reschedule a lesson for any reason up to 24 hours before the lesson is scheduled to start without penalty.
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownFourOpen = ! dropdownFourOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">Do I need to download anything?</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownFourOpen">
                    You don't need to download anything to follow our lessons. You can simply use Google Meet in your web browser.
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownFiveOpen = ! dropdownFiveOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">How many hours do I need to become fluent?</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownFiveOpen">
                    This is different for everyone, but your teacher will identify which skills you need to improve the most to
                     reach the level of fluency you need. They will then create a lesson plan just for you that will help you
                     reach fluency in the shortest amount of time possible.
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownSixOpen = ! dropdownSixOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">What if I don't have time to do homework?</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownSixOpen">
                    If you don't have time to do your course homework, we strongly recommend you wait to register for a course
                     until you have more time. The only way you can reach fluency in English is to practice and apply what you
                     learn from your teacher.
                </p>
            </div>
            <div class="mb-4 pb-4 border-b border-gray-300">
                <button class="inline-flex mx-5 md:mx-80" @click=" dropdownSevenOpen = ! dropdownSevenOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 mt-1 font-bold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h5 class="text-left text-3xl font-bold">Can my company pay for my lessons?</h5>
                </button>
                <p class="text-2xl mt-2 mx-5 md:mx-80" x-show="dropdownSevenOpen">
                    Yes they can! Simply enter your company invoice contact information in your student dashboard and we
                     will send them the invoice for you.
                </p>
            </div>
        </div>
    </div>

    @component ('components.testimonial')
    @endcomponent

    @if (Auth::check())
      <x-cta.user />
    @else
      <x-cta.visitor />
    @endif

</div>
</div>

</x-layouts.app>
