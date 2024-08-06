<x-layouts.courses.show :course="$course">
    <x-slot name="title">
        {{ $course->name }} | Online {{ $course->subcategory->name }} course from The Weaver School
    </x-slot>
    <x-slot name="description">
        {{ $course->description }}
    </x-slot>
    <x-slot name="image">
        {{ $course->image }}
    </x-slot>
    <div class="min-h-screen bg-black sm:px-5 md:px-16 lg:px-64 xl:px-80" x-data="{ plan:{{ $course->plans->first()->id }} }">
        <div class="pt-5 lg:pt-0 pb-12 mx-5 sm:mx-12">
            <div class="text-4xl md:text-6xl md:mb-7 font-bold text-gray-200 text-center">{{ $course->name }}</div>
            <div class="mx-auto" x-data="{ selectedVideo: '0'}">
                @if(count($course->promoVideos) > 0)
                    @foreach($course->promoVideos as $video)
                        <div x-cloak x-show="selectedVideo == {{ $loop->index }}"
                             :class="{ 'pb-[56.25%]': selectedVideo == {{ $loop->index }}, 'pb-0': selectedVideo != {{ $loop->index }} }"
                             class="relative w-3/4 mx-auto">
                            <iframe src="https://player.vimeo.com/video/{{ $video->vimeo_video_id }}?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0"
                                    :class="{ 'w-full h-full': selectedVideo == {{ $loop->index }}, 'w-0 h-0': selectedVideo != {{ $loop->index }} }"
                                    class="absolute top-0 left-0"
                                    allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                                    title="{{ $course->name }} promo video"></iframe>
                        </div>
                    @endforeach
                    <div x-cloak x-show="selectedVideo == 'courseImage'">
                        <img src="{{ $course->image }}" alt="{{ $course->name }}" class="object-cover object-center">
                    </div>
                @else    
                <img class="rounded-lg shadow-lg my-10 max-h-96 w-full object-cover mx-auto" src="{{ $course->image }}" alt="{{ $course->name }}">
                @endif
                
            </div>
            <div class="text-2xl text-gray-100 text-center prose-xl">{!! $course->about !!}</div>

            <x-courses.cta :course="$course" />

            @if($block = $course->contentBlocks->where('type', 'opening')->first())
                {!! $block->content !!}
            @endif

            @if(count($course->lessons) > 0)
                <div class="flex bg-gray-100 rounded-xl py-8 px-12 mt-16 lg:mx-10 shadow-sm">
                    <div class="mx-auto">
                        <div class="text-3xl font-bold text-teal-500 text-center mb-8">
                            What you'll learn...
                        </div>
                        <div class="prose prose-sm mt-2 text-gray-600">
                            @foreach($course->lessons as $lesson)
                                <livewire:courses.lesson-thumbnail :courseId="$course->id" :lessonId="$lesson->id" />
                            @endforeach
                            <div class="text-base text-center text-gray-900 font-bold mt-8">And much more...</div>
                        </div>
                    </div>
                </div>

                <x-courses.cta :course="$course" />
            @endif

            @if($block = $course->contentBlocks->where('type', 'created_by')->first())
                {!! $block->content !!}
            @endif

            @if(count($course->features) > 0)
                <div class="flex bg-gray-100 px-12 rounded-xl py-7 mt-16 lg:mx-10 shadow-sm">
                    <div class="mx-auto">
                        <div class="text-3xl text-center font-bold text-teal-500 mb-2">
                            Course Highlights
                        </div>
                        <div class="text-lg text-center text-gray-900 mt-1 mb-8">
                            Everything you'll get with your course:
                        </div>
                        <div class="prose prose-sm mt-2 text-gray-600">
                            @foreach($course->features as $feature)
                                <div class="text-lg font-semibold leading-7 text-gray-900">{{ $feature->name  }}</div>
                                <div class="text-base text-gray-600 mb-4">{{ $feature->description }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <x-courses.cta :course="$course" />
            @endif

            @if($block = $course->contentBlocks->where('type', 'differentiator')->first())
                {!! $block->content !!}
                <x-courses.cta :course="$course" />
            @endif

            @if($block = $course->contentBlocks->where('type', 'features_overview')->first())
                {!! $block->content !!}
            @endif

            @if($block = $course->contentBlocks->where('type', 'closing')->first())
                {!! $block->content !!}
                <x-courses.cta :course="$course" />
            @endif

            <x-courses.footer />

        </div>
    </div>
</x-layouts.courses.show>
