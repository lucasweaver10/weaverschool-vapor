<x-layouts.app>
    <x-myteacher.index>
        <x-slot name="title">
            {{ $registration->private_lessons_name }}
        </x-slot>
        <div>
            <livewire:myteacher.courses.show :registration="$registration" />
        </div>
    </x-myteacher.index>
</x-layouts.app>
