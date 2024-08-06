<div x-data="{selectedTeacher: 0 }" class="section bg-black text-white py-16 px-12">
    <div class="max-w-7xl pt-5 pb-3 sm:px-6 md:px-0 lg:max-w-7xl lg:px-0 mx-auto">
        <div class="text-3xl font-extrabold tracking-tight sm:text-3xl text-center mb-3">Your teacher...</div>
    </div>

    <svg id="carousel-previous-teacher" x-show="selectedTeacher > 0" role="button" @click="selectedTeacher--" class="h-6 w-6 float-left ml-5 mt-24 sm:mt-36" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>

    <svg id="carousel-next-teacher" x-show="selectedTeacher < {{ count($teachers) - 1 }}" role="button" @click="selectedTeacher++" class="h-6 w-6 float-right mr-5 mt-24 sm:mt-36" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
    </svg>

    @foreach($teachers as $teacher)
        <div x-cloak x-show="selectedTeacher === {{ $loop->index }}" x-transition:enter.duration:500ms class="grid items-center
                grid-cols-1 sm:px-12 lg:max-w-7xl md:px-20 lg:px-36 md:grid-cols-2 mb-5">

            <div class="sm:py-3 col-span-2 @if($loop->first) ml-5 @endif @if($loop->last) mr-5 @endif">
                <div class="space-y-4 sm:grid sm:grid-cols-3 sm:items-start sm:gap-6 sm:space-y-0">
                    <div class="object-cover">
                        <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 object-cover" src="{{ $teacher->image }}" alt="">
                    </div>
                    <div class="sm:col-span-2">
                        <div class="space-y-4">
                            <div class="text-lg leading-6 font-medium space-y-1">
                                <div class="mb-3"><span class="text-4xl sm:text-6xl font-extrabold tracking-tight">{{ $teacher->first_name }}</span></div>
                                @foreach($teacher->specialties as $specialty)<span class="inline-flex items-center px-3 py-1 mx-1 rounded-full text-sm font-medium bg-teal-400 text-white"> {{ $specialty->name }} </span>@endforeach
                            </div>
                            <div class="text-lg">
                                <p class="">{{ $teacher->about }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endforeach

</div>
