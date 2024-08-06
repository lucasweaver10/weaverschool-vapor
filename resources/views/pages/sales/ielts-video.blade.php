<x-layouts.squeeze>
<div style="font-family: 'proxima-nova', sans-serif;">
    <div class="bg-black pt-2 pb-12 md:px-12">
        <section>
            <div class="mt-5 mb-8 md:mx-24 xl:mx-48 px-4 py-4 text-center bg-yellow-300 text-3xl">
                @lang('pages/sales/ielts-video.ready_to') <span class="font-extrabold">@lang('pages/sales/ielts-video.pass_ielts')</span> <u><strong>@lang('pages/sales/ielts-video.first_time')</strong></u> @lang('pages/sales/ielts-video.take_exam')
            </div>
            <div class="mt-5 mb-12 mx-10 sm:mx-36 lg:mx-36 text-gray-100 text-center text-5xl font-bold">
                @lang('pages/sales/ielts-video.simple_framework')<span class="text-yellow-300">@lang('pages/sales/ielts-video.easily_write')</span> @lang('pages/sales/ielts-video.within_time')
            </div>
        </section>
        <section>
            <div class="grid grid-cols-6 mx-4 md:mx-24 mt-5">
                <div class="block md:hidden mb-5 md:mb-0 col-span-6">
                    <div style="padding:100% 0 0 0;position:relative;">
                        <iframe src="https://player.vimeo.com/video/864768619?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479?autoplay=1"
                                frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                                style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                title="IELTS Writing Course Introduction">

                        </iframe>
                    </div>
                    <script src="https://player.vimeo.com/api/player.js"></script>
                    <!-- Vimeo play tracking -->
                    <script type="text/javascript">
                    // Initialize Vimeo iframe and player
                    var iframe = document.querySelector('iframe');
                    var player = new Vimeo.Player(iframe);

                    // Listen for 'play' event
                    player.on('play', function() {
                    // Fire Google gtag event when video is played
                    gtag('event', 'conversion', {'send_to': 'AW-11283680998/960iCLzkh-YYEOadvYQq'});
                    });
                    </script>
                    <!-- End Vimeo tracking -->
                </div>
                <div class="hidden md:block col-span-6 md:col-span-4">
                    <div class="md:mr-12">
                        <div style="padding:56.25% 0 0 0;position:relative;">
                            <iframe src="https://player.vimeo.com/video/864789447?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479?autoplay=1"
                                    frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                    title="IELTS Writing Course Introduction">
                            </iframe>
                        </div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                        <div class="text-center pt-5 sm:pt-16 md:mt-0 text-5xl font-bold text-gray-100">
                            @lang('pages/sales/ielts-video.start_learning') <span class="text-yellow-400">@lang('pages/sales/ielts-video.now')</span>...
                        </div>
                    </div>
                </div>
                <div class="col-span-6 lg:col-span-2">
                    <div class="bg-white rounded-lg py-5 px-5 mx-12 md:mx-0 md:px-8 md:py-12 mt-12 sm:mt-8 lg:mt-0">
                        <div class="text-4xl text-center">
                            @lang('pages/sales/ielts-video.start_course') <span class="font-semibold">@lang('pages/sales/ielts-video.free')</span>
                        </div>
                        <div>
                            <img src="/images/pages/ielts/master ielts writing promo image.png" alt="arrow" class="mx-auto">
                        </div>
                        <div class="text-2xl font-bold text-center">
                            @lang('pages/sales/ielts-video.try_free_pay_after') @lang('currency.symbol'){{ $course->plans->first()->total_price }}
                        </div>
                        <div class="my-2 text-sm text-green-600 text-center font-bold">
                            @lang('pages/sales/ielts-video.plus_bonuses') @lang('currency.symbol')@lang('sales/ielts-info.bonuses_total')
                        </div>
                        <div class="mt-3">
                            <a class="block text-center bg-blue-400 text-white text-2xl py-4 px-3 w-full rounded-sm font-bold hover:bg-blue-500"
                            role="button" href="/register?course_id=1501&plan_id=2242">@lang('pages/sales/ielts-video.start_my_course_free')</a>
                        </div>
                        <div class="mt-5 text-sm">
                            @lang('pages/sales/ielts-video.backed_by_guarantee')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="bg-black py-16 px-10 md:px-24">
        <div class="mx-5 md:mx-36">
            <span class="text-gray-100 text-5xl font-bold"><em>@lang('pages/sales/ielts-video.master_ielts_writing')</em>
                @lang('pages/sales/ielts-video.gives_you') <u>@lang('pages/sales/ielts-video.shortcut')</u>
                @lang('pages/sales/ielts-video.to')
            </span>
            <span class="text-blue-300 text-5xl font-bold"> @lang('pages/sales/ielts-video.getting_score')</span>
            <div class="text-gray-100 text-2xl font-bold mt-12">@lang('pages/sales/ielts-video.sneak_peak')</div>
        </div>
        <div class="relative grid grid-cols-2 mt-12 lg:mx-24">
            <div class="col-span-2 sm:col-span-1">
                <img class="px-5 mb-12 md:mb-0" src="/images/pages/ielts/without framework graphic.png"
                     alt="ielts without academic essay framework graphic">
            </div>
            <div class="col-span-2 sm:col-span-1">
                <img class="px-5" src="/images/pages/ielts/with framework graphic.png"
                     alt="ielts with academic essay framework graphic">
            </div>
        </div>

        <div class="relative grid grid-cols-3 mt-16 lg:mx-24">
            <div class="col-span-3 sm:col-span-2">
                <div class="sm:pr-12 md:pr-24 text-gray-100">
                    <div class="text-4xl font-bold">@lang('pages/sales/ielts-video.passing_ielts_easier')</div>
                    <div class="text-2xl mt-8">@lang('pages/sales/ielts-video.you_might_think') <strong>@lang('pages/sales/ielts-video.not_the_case')</strong>.</div>
                    <div class="text-2xl mt-5">@lang('pages/sales/ielts-video.truth_is') <span class="text-blue-300 font-bold">@lang('pages/sales/ielts-video.even_if')</span></div>
                    <div class="text-2xl mt-8">@lang('pages/sales/ielts-video.after_learning') <strong>@lang('pages/sales/ielts-video.you_be_able')</strong> @lang('pages/sales/ielts-video.even_if')</div>
                    <div class="text-2xl mt-8">@lang('pages/sales/ielts-video.no_more') <strong>@lang('pages/sales/ielts-video.worrying_about')</strong>.</div>
                    <div class="text-2xl text-blue-300 mt-8 font-bold">@lang('pages/sales/ielts-video.clear_and_simple') <em>@lang('pages/sales/ielts-video.every_time')</em>.</div>
                </div>
            </div>
            <div class="col-span-3 sm:col-span-1">
                <div class="bg-white rounded-lg py-5 px-5 md:px-8 md:py-12 mt-8 lg:mt-0">
                    <div class="text-4xl text-center">
                        @lang('pages/sales/ielts-video.start_course') <span class="font-semibold">@lang('pages/sales/ielts-video.free')</span>
                    </div>
                    <div>
                        <img src="/images/pages/ielts/master ielts writing promo image.png" alt="arrow" class="mx-auto">
                    </div>
                    <div class="text-2xl font-bold text-center mb-2">
                        @lang('pages/sales/ielts-video.try_free_pay_after') @lang('currency.symbol'){{ $course->plans->first()->total_price }} @lang('pages/sales/ielts-video.after_that')
                    </div>
                    <div class="mt-3">
                        <a class="block text-center bg-blue-400 text-white text-2xl py-4 px-3 w-full rounded-sm font-bold hover:bg-blue-500"
                           role="button" href="/register?course_id=1501&plan_id=2242">@lang('pages/sales/ielts-video.start_my_course')</a>
                    </div>
                    <div class="mt-5 text-sm">
                        @lang('pages/sales/ielts-video.backed_by_guarantee')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-300 pt-10 sm:mpt-5 pb-12 sm:pb-5">
        <div class="grid grid-cols-12 mx-5 lg:mx-8 md:py-8 md:px-8">
            <div class="col-span-12 md:col-span-7">
                <div class="bg-white rounded-md shadow-md xl:mr-12 py-5 px-10">
                    <div class="text-5xl font-bold text-center text-blue-500 mb-5">
                        @lang('pages/sales/ielts-video.what_is_my') @lang('pages/sales/ielts-video.master_ielts')
                    </div>
                    <div class="text-2xl prose">
                        <div id="ielts-writing-masterclass-intro">
                            <p class="my-12">@lang('pages/sales/ielts-video.average_score')</p>
                            <p class="my-12">@lang('pages/sales/ielts-video.many_universities')</p>
                            <p class="my-12">@lang('pages/sales/ielts-video.because_of_this')
                                <strong>@lang('currency.symbol')<u>@lang('pages/sales/ielts-info.price_per_attempt')
                                        @lang('pages/sales/ielts-video.per_attempt')</u>
                                </strong>
                                        @lang('pages/sales/ielts-video.these_costs')
                                        @lang('currency.symbol')@lang('pages/sales/ielts-info.add_up_to_1'),
                                @lang('currency.symbol')@lang('pages/sales/ielts-info.add_up_to_2')
                                        @lang('pages/sales/ielts-video.or_more')</em></p>
                        </div>
                        <div id="course-focus">
                            <p class="my-12">@lang('pages/sales/ielts-video.why_created')<span class="text-blue-400 font-bold">
                                    <em>@lang('pages/sales/ielts-video.master_ielts_writing')</em></span>
                                @lang('pages/sales/ielts-video.course_to_teach')</p>
                            <p class="my-12">@lang('pages/sales/ielts-video.learning_to_use')</p>
                            <p class="my-5">@lang('pages/sales/ielts-video.make_this_happen')</p>
                        </div>
                        <div class="mt-5" id="focus-area-1">
                            <p class="my-12"><strong>@lang('pages/sales/ielts-video.scoring_criteria')</strong> @lang('pages/sales/ielts-video.this_framework')</p>
                            <p class="my-12">@lang('pages/sales/ielts-video.first_step')</p>
                        </div>
                        <div class="mt-5" id="focus-area-2">
                            <p class="my-12"><strong>@lang('pages/sales/ielts-video.learning_using')</strong> @lang('pages/sales/ielts-video.next_step')</p>
                            <p class="my-12">@lang('pages/sales/ielts-video.know_framework')</p>
                            <p class="my-12">@lang('pages/sales/ielts-video.without_improving')</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-5">
                <div class="md:mx-12">
                    <div class="bg-black rounded-xl">
                        <div class="text-3xl font-bold text-center text-white mt-8 sm:mt-0 py-3 px-3 mb-8">
                            @lang('pages/sales/ielts-video.included_title')
                        </div>
                    </div>
                    <div class="grid grid-cols-5 md:gap-y-5">
                        <div class="col-span-2 mr-10">
                            <img src="/images/pages/ielts/master ielts writing video lessons.png"
                                 alt="arrow" class="mx-auto h-28">
                        </div>
                        <div class="col-span-3">
                            <div class="text-2xl font-bold">@lang('pages/sales/ielts-video.video_lessons_title')</div>
                            <div class="mb-3 text-sm">
                                @lang('pages/sales/ielts-video.video_lessons_description')
                            </div>
                        </div>
                        <div class="col-span-2 mr-10">
                            <img src="/images/pages/ielts/master ielts writing ebook.png"
                                 alt="arrow" class="mx-auto h-28">
                        </div>
                        <div class="col-span-3">
                            <div class="text-2xl font-bold">@lang('pages/sales/ielts-video.ebook_title')</div>
                            <div class="mb-3 text-sm">
                                @lang('pages/sales/ielts-video.ebook_description')
                            </div>
                        </div>
                        <div class="col-span-2 mr-10">
                            <img src="/images/pages/ielts/master ielts writing audiobook.png"
                                 alt="arrow" class="mx-auto h-28">
                        </div>
                        <div class="col-span-3 justify-center">
                            <div class="text-2xl font-bold">@lang('pages/sales/ielts-video.audiobook_title')</div>
                            <div class="mb-3 text-sm">
                                @lang('pages/sales/ielts-video.audiobook_description')
                            </div>
                        </div>
                        <div class="col-span-2 mr-10">
                            <img src="/images/pages/ielts/master ielts writing essay grader.png"
                                 alt="arrow" class="mx-auto h-28">
                        </div>
                        <div class="col-span-3">
                            <div class="text-2xl font-bold">@lang('pages/sales/ielts-video.ai_checker_title')</div>
                            <div class="mb-3 text-sm">
                                @lang('pages/sales/ielts-video.ai_checker_description')
                            </div>
                        </div>
                        <div class="col-span-2 mr-10">
                            <img src="/images/pages/ielts/master ielts writing digital flashcards.png"
                                 alt="arrow" class="mx-auto h-28">
                        </div>
                        <div class="col-span-3">
                            <div class="text-2xl font-bold">@lang('pages/sales/ielts-video.digital_flashcards_title')</div>
                            <div class="mb-3 text-sm">
                                @lang('pages/sales/ielts-video.digital_flashcards_description')
                            </div>
                        </div>
                        <div class="col-span-2 mr-10">
                            <img src="/images/pages/ielts/master ielts writing pdf guide group.png"
                                 alt="arrow" class="mx-auto h-28">
                        </div>
                        <div class="col-span-3">
                            <div class="text-2xl font-bold">@lang('pages/sales/ielts-video.guide_transitions_title')</div>
                            <div class="mb-3 text-sm">
                                @lang('pages/sales/ielts-video.guide_transitions_description')
                            </div>
                        </div>
                    </div>
                    <div class="bg-black rounded-xl mt-8">
                        <div class="text-3xl font-bold text-center text-white py-3 mb-4">
                            @lang('pages/sales/ielts-video.start_learning_free')
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-center">
                        @lang('pages/sales/ielts-video.get_access_course_now')
                    </div>
                    <div class="text-xl mt-2 xl:mx-8">
                        @lang('pages/sales/ielts-video.free_trial_info')
                    </div>
                    <div class="mt-3 lg:mx-12">
                        <a href="/register?course_id=1501&plan_id=2242" role="button" class="block bg-blue-400 text-center
                    text-white text-3xl py-5 px-3 w-full rounded-sm font-bold hover:bg-blue-500">
                            @lang('pages/sales/ielts-video.start_course_free_button')
                        </a>
                    </div>
                    <div class="mt-3 text-base text-center xl:mx-20">
                        @lang('pages/sales/ielts-video.money_back_guarantee')
                    </div>
                    <div class="mt-5 text-2xl text-center font-bold xl:mx-20">
                        @lang('pages/sales/ielts-video.meet_teacher_title')
                    </div>
                    <div class="text-center">
                        <img class="h-56 w-56 mx-auto my-4 rounded-full xl:w-56 xl:h-56 object-cover"
                             src="https://we-public.s3.eu-north-1.amazonaws.com/images/teachers/lucas+weaver+english+teacher+weaver+school.png" alt="">
                    </div>
                    <div class="text-xl mt-4 xl:mx-20">
                        @lang('pages/sales/ielts-video.meet_teacher_description')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-black py-12">
        <div class="text-xl font-bold text-green-400 text-center">
            @lang('pages/sales/ielts-video.get_instant_access')
        </div>
        <div class="mt-3 mx-12 md:mx-36 xl:mx-72">
            <a class="block bg-blue-400 text-center text-gray-100 text-2xl md:text-5xl py-5 rounded-sm font-bold hover:bg-blue-500"
               role="button"
               href="/register?course_id=1501&plan_id=2242">
                @lang('pages/sales/ielts-video.start_my_course_now')
                <span class="block text-xl md:text-4xl text-center text-gray-100">...and get instant access</span>
            </a>
            <div class="mt-4 text-lg md:text-2xl font-bold text-gray-100 text-center">
                @lang('pages/sales/ielts-video.backed_by_guarantee')
            </div>
        </div>
    </div>

    <div class="bg-white border border-t-1 border-gray-400 py-4">
        <!-- Add the logo down below -->
        <img class="h-24 mx-auto" alt="" src="{{config('app.logo')}}">
        <div class="text-center">@lang('pages/sales/ielts-video.need_help_email_me') <a href="mailto:lucas@weaverschool.com">lucas@weaverschool.com</a></div>
        <div class="text-center mt-3 xl:mx-56"><strong>@lang('pages/sales/ielts-video.disclaimer')</strong> @lang('pages/sales/ielts-video.disclaimer_content')
        </div>
        <div class="mt-4 font-bold text-sm text-center text-gray-600 hover:text-gray-900"><a href="{{ route('privacy-policy', ['locale' => session('locale')]) }}">Privacy Policy</a> | <a href="{{ route('general-terms', ['locale' => session('locale')]) }}">General Terms</a> | <a href="{{ route('impressum', ['locale' => session('locale')]) }}">Impressum</a> | <a href="mailto:lucas@weaverschool.com">Contact me</a></div>

    </div>
</div>
</x-layouts.squeeze>
