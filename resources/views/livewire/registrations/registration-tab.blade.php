<div class="grid grid-cols-3 gap-10" x-data="{
    step: @entangle('step').live,
    selection: @entangle('selection').live
}"
    wire:submit="" onkeydown="return event.key != 'Enter';">
    <div class="col-span-4 lg:col-span-2">

        <div class="course-type-form" x-show="step === 0">
            <livewire:registrations.choose-course-type :courses="$courses" :privateLessons="$privateLessons"/>
        </div>

        <div class="course-type-form" x-show="step === 1 && selection === 'Private Lessons'">
            <livewire:registrations.private-lessons :courses="$courses" :subcategories="$subcategories" :privateLessons="$privateLessons"
                :teachers="$teachers"/>
        </div>

        <div class="course-type-form" x-show="step === 1 && selection === 'Group Course'">
            <livewire:registrations.group-course :courses="$courses" :subcategories="$subcategories"/>
        </div>
    {{--    <div class="float-right mt-5">--}}
    {{--        <button class="btn btn-sm btn-light" type="button" x-show="step !== 0 && step !== 'completed'"--}}
    {{--            x-on:click="step--">Start Over</button>--}}
    {{--    </div>--}}
    </div>

    <div class="col-span-4 lg:col-span-1">
        <div class="rounded-lg bg-white p-4 shadow-sm">
            <p>@lang('dashboard/registration.lessons_normally')</p>
            <p>@lang('dashboard/registration.most_students')</p>
            <p>@lang('dashboard/registration.add_hours_anytime')</p>
            <p>@lang('dashboard/registration.monthly_payments')</p>
        </div>
    </div>
</div>
