<x-layouts.app>
    <x-slot name="title">
        Practice IELTS Speaking Test | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            {{ $test->title }}
        </x-slot>
        <div>          
                       
        <livewire:ielts.speaking.practice-tests.submit :test="$test" />
    
    <x-alerts.success />
    <x-alerts.error />    

        </div>
    </x-dashboard.index>
</x-layouts.app>
