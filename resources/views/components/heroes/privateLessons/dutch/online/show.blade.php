<div class="relative">
    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100"></div>
    <div class="mx-auto">
        <div class="relative sm:overflow-hidden">
            <div class="absolute inset-0">
                <img class="h-full w-full object-cover" src="{{ $privateLesson->image }}" alt="People working on laptops">
                <div class="absolute inset-0 bg-gray-500 mix-blend-multiply"></div>
            </div>
            <div class="relative px-4 pt-16 sm:px-6 sm:pt-24 lg:pt-32 lg:px-8">
                <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    <span class="block text-white">@if ( request('headline') ){{ request('headline') }} @else @lang('privateLessons/dutch/online/show.heading')@endif</span>
                </h1>
                <p class="mt-6 max-w-lg mx-auto text-center text-xl text-white sm:max-w-3xl">@lang('privateLessons/dutch/online/show.become_fluent_text')</p>
                <div class="max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                    <div class="space-y-4 sm:space-y-0 sm:mx-auto">
                        @if (Auth::check())
                            <a href="/dashboard" id="hero-view-dashboard-button" onclick="fathom.trackGoal('CLICKED-HERO-DASHBOARD-BUTTON', 0);" class="unstyled w-48 mt-4 mx-auto flex items-center justify-center py-3 text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 md:py-4 md:text-lg">
                                @lang('privateLessons/dutch/online/show.dashboard_button')
                            </a>
                        @else
                            <a href="/register" id="hero-create-account-button" onclick="fathom.trackGoal('CLICKED-HERO-CREATE-ACCOUNT-BUTTON', 0);" class="unstyled w-48 mt-4 mx-auto flex items-center justify-center py-3 text-base font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 md:py-4 md:text-lg">
                                @lang('privateLessons/dutch/online/show.create_account_button')
                            </a>
                        @endif
                    </div>
                </div>
                <div class="text-white text-center mt-16 pb-8">
                    @lang('privateLessons/dutch/online/show.5') <svg class="h-6 w-6 text-white inline-flex" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg> @lang('privateLessons/dutch/online/show.rating_on') <a class="unstyled" onclick="fathom.trackGoal('CLICKED-GOOGLE-REVIEWS-LINK', 0);" target="blank" id="google-reviews-link" href="https://www.google.com/search?sxsrf=ALiCzsaBeYtkVTm54jiGJS_zQYPGLvC6DQ:1651992919908&q=The+Weaver+School+Rotterdam&si=AC1wQDCb48pJOhjniU-CPpWXcWQCAuOVlcIjSvs_FGbLklR5dipR4CZU-Bh6RVPN4uKroK1lGZ8mUkbYd4jcpFl_av4nmEnqNjF13LyKhq41-arXtXSYLP_66-HInZDTo953UThceH3JIN44TBSrIthStAwAhuntf7bxhUsI7H5sOQPIFR5ejps%3D&sa=X&ved=2ahUKEwjYjaaZqc_3AhViIbcAHYVlAWMQ6RN6BAgxEAE&biw=1432&bih=764&dpr=2#lrd=0x47c434b318fa5bd5:0x50418520688d5fdb,1,,,">Google Reviews</a>
                </div>
            </div>
        </div>
    </div>
</div>
