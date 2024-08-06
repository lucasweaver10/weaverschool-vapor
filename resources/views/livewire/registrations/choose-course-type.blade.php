<div x-data="{
    step: @entangle('step').live,
    selection: @entangle('selection').live
}"
    wire:submit="" onkeydown="return event.key != 'Enter';">

{{--    <div id="course-type-selector" class="rounded-lg bg-white p-4 shadow-sm">--}}
{{--        <p class="text-xl">@lang('dashboard/registration.course_type')</p>--}}
{{--        <div class="form-group">--}}
{{--            <select wire:model.live="selection" class="form-control" id="course_id" name="course_id">--}}
{{--                <option value="Private Lessons">@lang('dashboard/registration.private_lessons')</option>--}}
{{--                <option value="Group Course">@lang('dashboard/registration.group_course')</option>--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <button wire:click="$dispatchUp('courseSelected', '{{ $this->selection }}')" class="inline-flex items-center px-4--}}
{{--            py-3 mt-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500--}}
{{--            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">@lang('dashboard/registration.continue_button')</button>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="rounded-lg bg-gray-200 h-5 mt-5 mb-6 border-solid border-blue-400 border-l-4">--}}
{{--        <div class="bg-gray-600 h-5 rounded-lg" style="width: 0%"></div>--}}
{{--    </div>--}}


     <div class="">
         <p class="text-xl mb-5">@lang('dashboard/registration.course_type')</p>
         <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-2 xl:gap-x-8">
            <li class="relative" >
                <div @click=" selection = 'Private Lessons' " class="group block w-full aspect-w-10 aspect-h-7 rounded-lg
                bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100
                focus-within:ring-blue-500 overflow-hidden">
                    <img src="{{ asset('/images/online-lesson-4.jpg') }}" alt="" class="object-fit pointer-events-none
                    group-hover:opacity-75">
                    <button type="button" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">@lang('dashboard/registration.private_lessons')</span>
                    </button>
                </div>
                <p class="mt-2 block text-sm font-medium text-gray-900 text-center truncate pointer-events-none">
                    @lang('dashboard/registration.private_lessons')
                </p>
            </li>

            <li class="relative">
                <div  @click=" selection = 'Group Course' " class="group block w-full aspect-w-10 aspect-h-7 rounded-lg
                bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100
                focus-within:ring-blue-500 overflow-hidden">
                    <img src="{{ asset('/images/private-in-person-english-lessons.jpg') }}" alt="" class="object-cover
                    pointer-events-none group-hover:opacity-75">
                    <button type="button" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">@lang('dashboard/registration.group_course')</span>
                    </button>
                </div>
                <p class="mt-2 block text-sm font-medium text-gray-900 text-center truncate pointer-events-none">
                    @lang('dashboard/registration.group_course')
                </p>
            </li>

            <!-- More files... -->
        </ul>

        <div class="form-group mt-5">
            <button wire:click="$dispatchUp('courseSelected', '{{ $this->selection }}')" class="w-full text-center
            items-center px-4 py-3 mt-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white
            bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                @lang('dashboard/registration.continue_button')
            </button>
        </div>

     </div>
</div>
