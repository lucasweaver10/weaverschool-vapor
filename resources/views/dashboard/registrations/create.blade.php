<x-layouts.app>
<x-slot name="title">
        Register for a course | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            @lang('dashboard/registration.course_registration')
        </x-slot>
        <livewire:dashboard.registrations.create :user="$user" :subcategories="$subcategories"/>
    </x-dashboard.index>
</x-layouts.app>
