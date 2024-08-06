<x-layouts.app>
<x-slot name="title">
    Confirm your registration
</x-slot>
    <div class="relative lg:block">
        <div class="absolute top-0 left-0 ml-2 p-4">
            <img src="{{config('app.logo_dark')}}" alt="the Weaver School logo" class="h-10 w-auto">
        </div>
    </div>
    <div>
        <livewire:dashboard.registrations.store-stripe :user="$user" :course="$course" :plan="$plan"/>
    </div>
</x-layouts.app>
