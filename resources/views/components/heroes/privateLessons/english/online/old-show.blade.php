<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative overflow-hidden lg:h-96 bg-cover bg-right-bottom" style="background-image: url({{ $privateLesson->image }});">
    <div class="mx-auto">
        <div class="relative z-10 pb-8 bg-gray-900 bg-opacity-60 sm:pb-16 md:pb-20 w-full sm:h-80 md:h-96 lg:h-screen lg:pb-28 xl:pb-32">
            <main class="mt-0 mx-auto max-w-7xl sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 xl:mt-28">
                <div class="text-center py-12 sm:py-18 md:py-20 px-10 lg:px-16">
                    <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">{{$privateLesson->name}}</span>
                    </h1>
                    <p class="text-white text-xl">
                        <span class="block xl:inline">{{ $privateLesson->description }}</span>
                    </p>
                    @if (Auth::check())--}}
                        <a href="/dashboard" class="unstyled w-48 mt-4 mx-auto flex items-center justify-center py-3
                                    text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 md:py-4 md:text-lg">
                            @lang('privateLessons/index.create_account_button')
                        </a>
                    @else
                        <a href="/register" class="unstyled w-48 mt-4 mx-auto flex items-center justify-center py-3
                                text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 md:py-4 md:text-lg">
                            @lang('privateLessons/index.create_account_button')
                        </a>
                    @endif
                </div>
            </main>
        </div>
    </div>
{{--    <div class="absolute inset-y-0 right-0 w-full">--}}
{{--        <img class="h-56 w-full object-cover object-center sm:h-80 md:h-96 lg:w-full" src="{{ $privateLesson->image }}" alt="{{ $privateLesson->name }}">--}}
{{--    </div>--}}
</div>
