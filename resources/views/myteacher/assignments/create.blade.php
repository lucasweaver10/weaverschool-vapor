<x-layouts.app>
    <x-myteacher.index>
        <x-slot name="title">
            Create Assignment
        </x-slot>
        <div>
            <livewire:myteacher.assignments.create :groups="$groups" :registrations="$registrations" />
        </div>
    </x-myteacher.index>
</x-layouts.app>
