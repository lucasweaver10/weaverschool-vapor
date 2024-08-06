<x-layouts.app>
    <x-slot name="title">
        Confirm your registration | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index :user="$user" >
        <x-slot name="title">
            @lang('dashboard/registration.course_registration')
        </x-slot>
{{--        <livewire:dashboard.registrations.store-trial :user="$user" :course="$course" :plan="$plan"/>--}}
        <livewire:dashboard.registrations.store-stripe :user="$user" :course="$course" :plan="$plan"/>

    </x-dashboard.index>
</x-layouts.app>
