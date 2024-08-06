<x-layouts.app>
  <x-slot name="title">
    About The Weaver School
  </x-slot>
  <x-slot name="description">
    The Weaver School provides premium online language lessons to students across the world.
  </x-slot>
<x-layouts.guest>

<x-heroes.pages.about />

    <div class="section bg-light">
        <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8 pt-16 pb-5">
            <div class="lg:grid lg:grid-cols-1" style="">
                <div class="group relative">
                    <h2>@lang('pages/about.team_heading')</h2>
                    <p>@lang('pages/about.team_text')</p>
                </div>
            </div>
            <div class="lg:grid lg:col-span-2" style="">
                <div class="group relative">
                    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                        <img src="https://we-public.s3.eu-north-1.amazonaws.com/images/pages/lucas+weaver+founder+the+weaver+school.png" alt="lucas weaver founder of online language school the weaver school" class="w-full h-96 object-center object-cover rounded-lg mb-2">
                    </div>
                    <div class="mt-3">
                        <h3 class="">@lang('pages/about.lucas')</h3>
                        <p class="">@lang('pages/about.lucas_text')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8 mt-24 mb-16">
        <div class="lg:grid lg:grid-cols-1" style="">
            <div class="group relative">
                <h2>@lang('pages/about.teaching_style_heading')</h2>
                <p>@lang('pages/about.teaching_style_text')</p>
            </div>
        </div>
        <div class="lg:grid lg:grid-cols-1" style="">
            <div class="group relative">
                <div class="aspect-w-3 aspect-h-2 overflow-hidden">
                    <img src="/images/online-lessons-1.jpg" class="w-full h-72 object-center object-cover rounded-lg mb-2">
                </div>
                <div class="mt-3">
                    <h3 class="">@lang('pages/about.relevant_content_heading')</h3>
                    <p class="">@lang('pages/about.relevant_content_text')</p>
                </div>
            </div>
        </div>
        <div class="lg:grid lg:grid-cols-1" style="">
            <div class="group relative">
                <div class="aspect-w-3 aspect-h-2 overflow-hidden">
                    <img src="/images/online-lessons-3.jpg" class="w-full h-72 object-center object-cover rounded-lg mb-2">
                </div>
                <div class="mt-3">
                    <h3 class="">@lang('pages/about.customized_lessons_heading')</h3>
                    <p class="">@lang('pages/about.customized_lessons_text')</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-light">
        <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8 mt-5 pt-16 pb-5">
            <div class="lg:grid lg:grid-cols-1" style="">
                <div class="group relative">
                    <h2>@lang('pages/about.mission')</h2>
                    <p>@lang('pages/about.mission_text')</p>
                </div>
            </div>
            <div class="lg:grid lg:grid-cols-1" style="">
                <div class="group relative">
                    <div class="aspect-w-2 aspect-h-2 overflow-hidden">
                        <img src="/images/lucas and seyma card.jpeg" class="w-full h-72 object-center rounded-lg object-cover mb-2">
                    </div>
                    <div class="mt-3">
                        <h3 class="">@lang('pages/about.customer_service_heading')</h3>
                        <p class="">@lang('pages/about.customer_service_text')</p>
                    </div>
                </div>
            </div>
            <div class="lg:grid lg:grid-cols-1" style="">
                <div class="group relative">
                    <div class="aspect-w-2 aspect-h-2 rounded-lg overflow-hidden">
                        <img src="/images/online_english_lessons_netherlands.jpg" class="w-full h-72 object-center rounded-lg object-cover mb-2">
                    </div>
                    <div class="mt-3">
                        <h3 class="">@lang('pages/about.experienced_teachers_heading')</h3>
                        <p class="">@lang('pages/about.experienced_teachers_text')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-blue-400 p-3 text-white">
        <div class="max-w-4xl mx-auto pb-0 py-5 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0">
            <div class="text-3xl font-extrabold tracking-tight text-white sm:text-3xl text-center mb-5">What our students say...</div>
            <x-testimonials.carousel />
        </div>
    </div>

<!-- CTA -->
    @if (Auth::check())
        <x-cta.welcome.user />
    @else
        <x-cta.welcome.visitor />
    @endif
</x-layouts.guest>
</x-layouts.app>
