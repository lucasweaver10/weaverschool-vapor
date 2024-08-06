<x-layouts.app>
    <x-slot name="title">
        New trial thank you | The Weaver School
    </x-slot>
    <x-slot name="description">
        Thank you for starting your 7-day free trial with the Weaver School.
    </x-slot>
    <div class="py-5 flex px-12 bg-black">
        <div class="mb-4 text-center mx-auto text-white">
            <h1 class="text-center text-4xl font-semibold">Trial set-up successful!</h1>
            <p class="mt-4 mb-5 text-2xl md:mx-56">Congratulations on starting your 7-day free trial! You will receive an
                email confirmation in just a few minutes.</p>
            <p class="mt-4 mb-5 text-2xl md:mx-56">You can access your course by clicking on the button below. Your card
                will be charged automatically in 7 days. You can cancel your trial at any time in the "Payments" section
                of your dashboard.</p>
            <p class="mt-4 mb-12 text-2xl md:mx-56">Welcome to the Weaver School, and happy learning!</p>
{{--            <div class="w-1/2 mx-auto my-8"><div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/864789447?badge=0&amp;autopause=0&amp;quality_selector=1&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Master IELTS Writing Info (desktop)"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script></div>--}}
{{--            <p class="mt-4 mb-5 text-2xl md:mx-56">Before you log in to your dashboard and start your course, please watch this short welcome video where I explain--}}
{{--             how everything works inside your course.</p>--}}
            <div class="my-8"><a role="button" href="/{{ session('locale') }}/dashboard"
               class="py-3 px-3 bg-teal-400 hover:bg-teal-500 text-green-900 rounded-lg font-normal text-2xl">Start your course</a>
            </div>
        </div>
    </div>

</x-layouts.app>
