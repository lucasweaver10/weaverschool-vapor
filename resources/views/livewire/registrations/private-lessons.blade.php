<div x-data="{
    step: @entangle('step').live,
    progress: @entangle('progress').live,
    selectedCourseType: @entangle('selectedCourseType').live,
    selectedSubcategoryId: '',
    selectedPrivateLessonsId: '',
    selectedTeacherId: @entangle('selectedTeacherId').live,
}"
    wire:submit="" onkeydown="return event.key != 'Enter';">

    <div wire:loading wire:target="registerPrivateLessons">
        <img src="/images/loading.gif" class="w-36 h-36 mt-5 ml-5 mb-5">
    </div>

    <div x-show="step !== 'completed'" wire:loading.remove wire:target="registerPrivateLessons" class="rounded-lg bg-white p-4 shadow-sm">
        <div id="private-lessons-selection-form" class="" x-show="step === 1">
            <p class="text-xl">@lang('dashboard/registration.choose_language')</p>
            <div class="form-group">
                <select x-model="selectedSubcategoryId" wire:model.live="selectedSubcategoryId" class="form-control">
                    <option value="">@lang('dashboard/registration.choose_a_language')</option>
                    @foreach ($subcategories as $subcategory)
                        <option value={{ $subcategory->id }}>{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button wire:click="processSubcategorySelection" class="inline-flex items-center px-4 py-3 mt-4 border
                border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400" style="">@lang('dashboard/registration.continue_button')</button>
            </div>
        </div>

        <div id="private-lessons-selection-form" class="" x-show="step === 2">
            <p class="text-xl">@lang('dashboard/registration.choose_course')</p>
                    <select x-model="selectedPrivateLessonsId" wire:model.live="selectedPrivateLessonsId" class="form-control">
                        <option value="">@lang('dashboard/registration.choose_a_course')</option>
                            @foreach ($privateLessons as $privateLesson)
                                    <option x-show="selectedSubcategoryId === '{{ $privateLesson->subcategory_id }}' " value={{ $privateLesson->id }}>{{ $privateLesson->name }}</option>
                            @endforeach
                    </select>
            <div class="form-group">
                @foreach ($privateLessons as $privateLesson)
                    <div x-cloak x-show="selectedPrivateLessonsId === '{{ $privateLesson->id }}'">
                        <p class="mt-4">{{ $privateLesson->about }}</p>
                    </div>
                @endforeach
                <button wire:click="processPrivateLessonSelection" class="inline-flex items-center px-4 py-3 mt-4 border
                border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400" style="">@lang('dashboard/registration.continue_button')</button>
            </div>
        </div>

        <div id="teacher-selection-form" class="" x-show="step === 3">
                <p class="text-xl">@lang('dashboard/registration.choose_teacher')</p>
                @foreach($teachers as $teacher)
                    <div x-cloak x-show="selectedTeacherId === '{{ $teacher->id }}'">
                        <li class="sm:pt-4 sm:pb-8 list-unstyled">
                            <div class="space-y-4 sm:grid sm:grid-cols-3 sm:items-start sm:gap-6 sm:space-y-0">
                                <div class="aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
                                    <img class="object-cover shadow-md rounded-lg max-h-60" src="{{ $teacher->image }}" alt="">
                                </div>
                                <div class="sm:col-span-2">
                                    <div class="space-y-4">
                                        <div class="text-lg leading-6 font-medium space-y-1">
                                            <h3 class="text-3xl inline-flex">{{ $teacher->first_name }}</h3>
                                            <div class="inline-flex ml-2 text-gray-800"> {{ $teacher->years_experience }} @lang('dashboard/registration.years_experience')</div>
                                            <p class="text-sm text-gray-800">@foreach($teacher->specialties as $specialty)<span class="mr-3">{{ $specialty->name }}</span>@endforeach</p>
                                        </div>
                                        <div class="text-lg">
                                            <p class="">{{ $teacher->about }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                @endforeach

                <div class="form-group">
                    <select x-model="selectedTeacherId" wire:model.live="selectedTeacherId" class="form-control">
                        @foreach ($teachers as $teacher)
                            <option x-show="selectedSubcategoryId === '{{ $teacher->subcategory_id }}'"
                                    value={{ $teacher->id }}>{{ $teacher->first_name }} (€{{ $teacher->gross_hourly_rate }}/@lang('dashboard/registration.hour'))</option>
                        @endforeach
                    </select>
                </div>
            <button wire:click="processTeacher" class="inline-flex items-center px-4 py-3 mt-4 border border-transparent
            shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2
            focus:ring-offset-2 focus:ring-blue-400" style="">@lang('dashboard/registration.continue_button')</button>
        </div>

        <div x-cloak id="hours-selection-form" class="" x-show="step === 4">
            <p class="text-xl">@lang('dashboard/registration.choose_hours') <small>@lang('dashboard/registration.minimum')</small></p>
            <div class="form-group">
                <input wire:model.live="totalHours" class="form-control" id="hours" name="hours" type="text" wire:text="totalHours" value="12">
            </div>
            <p class="text-xl">@lang('dashboard/registration.choose_lessons')</p>
            <div class="form-group">
                <select wire:model.live="weeklyLessons" class="form-control">
                    <option value=1>1</option>
                    <option value=2>2</option>
                </select>
            </div>
            <button wire:click="processPrivateLessons" class="inline-flex items-center px-4 py-3 mt-2 border border-transparent
            shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2
            focus:ring-offset-2 focus:ring-blue-400" style="">@lang('dashboard/registration.continue_button')</button>
        </div>

        <div wire:loading.remove id="confirm-registration-form" class="" x-show="step === 5">
            <p class="text-xl">@lang('dashboard/registration.please_review')</p>
            <table class="table">
                <tbody>
                  <tr>
                    <th scope="row">@lang('dashboard/registration.review_course_type')</th>
                    <td>{{ $this->selectedCourseType ?? '' }}</td>
                </tr>
                <tr>
                    <th scope="row">@lang('dashboard/registration.review_course_name')</th>
                    <td>{{ $this->selectedPrivateLessons->name ?? '' }}</td>
                </tr>
                <tr>
                    <th scope="row">@lang('dashboard/registration.review_teacher')</th>
                    <td>{{ $this->teacher->name ?? '' }}</td>
                </tr>
                <tr>
                    <th scope="row">@lang('dashboard/registration.review_total_hours')</th>
                    <td>{{ $this->totalHours ?? '' }}</td>
                </tr>
                <tr>
                    <th scope="row">@lang('dashboard/registration.review_hourly_rate')</th>
                    <td>€{{ $this->hourlyRate ?? '' }}</td>
                </tr>
                <tr>
                    <th scope="row">@lang('dashboard/registration.review_total_price')</th>
                    <td>€{{ $this->totalPrice ?? '' }}</td>
                  </tr>
                </tbody>
              </table>

                <button wire:click="registerPrivateLessons" class="inline-flex items-center px-4 py-3 mt-4 border
                border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400" style="">@lang('dashboard/registration.register_button')</button>
        </div>

        <div x-show="step != 1 && step !== 'completed'" class="grid justify-items-end">
            <button class="btn btn-sm btn-light" type="button" x-on:click="step--">@lang('dashboard/registration.go_back_button')</button>
        </div>

    </div>

    <div class="thank-you" x-show="step === 'completed'">
        <div class="rounded-xl bg-white p-4 shadow-sm">
            <h4 class="text-center">@lang('dashboard/registration.success_message')</h4>
            <div style="width:100%;height:0;padding-bottom:56%;position:relative;"><iframe src="https://giphy.com/embed/BPJmthQ3YRwD6QqcVD" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div>
        </div>
    </div>

    <div id="progress-bar" wire:loading.remove wire:target="registerPrivateLessons" x-show="step !== 'completed'"
         class="rounded-lg bg-gray-200 h-5 mt-5 mb-6">
        <div class="bg-blue-400 h-5 rounded-lg" style="width: {{ $progress }}%"></div>
    </div>

    <x-alerts.success>
    </x-alerts.success>
</div>
