<x-layouts.app title="Private English Lessons | The Weaver School">
  <x-slot name="title">
    Private online English lessons you can take anywhere | The Weaver School
  </x-slot>
  <x-slot name="description">
    Private English lessons fully customized for your needs.
  </x-slot>
    @php $locale = App::getLocale(); @endphp
<x-heroes.privateLessons.index />

    <div class="bg-blue-400">
        <div class="max-w-2xl mx-auto pt-5 pb-0 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-0">
            <div class="row">
                <div class="col-lg-3 col-sm-12 text-white">
                    <h2>@lang('privateLessons/index.premium_courses_title')</h2>
                    <p class="lead">@lang('privateLessons/index.premium_courses_text')</p>
                </div>
                <div class="col-lg-9 col-sm-12 col-md-12">
                    <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
                        @foreach($privateLessons as $privateLesson)
                            <div class="lg:grid lg:grid-cols-1 lg:gap-y-8">
                                <div class="group relative">
                                    <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                                        <img src="{{ asset($privateLesson->image) }}" class="w-full h-full object-center object-cover" alt="private lessons The Weaver School">
                                    </div>
                                    <div class="text-white mt-4">
                                        <h3 class="">{{ $privateLesson->name }}</h3>
                                        <p class="">{{ $privateLesson->description }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <a href="/{{ $locale }}/english/private-lessons/{{ $privateLesson->slug }}" class="btn btn-lg btn-light mb-5">View course</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@if (Auth::check())
  <x-cta.user />
@else
  <x-cta.visitor />
@endif

</x-layouts.app>
