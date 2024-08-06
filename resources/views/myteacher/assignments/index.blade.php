<x-layouts.app>
    <x-myteacher.index  :user="$user">
        <x-slot name="title">
            Assignments
        </x-slot>
        <div>
            <livewire:myteacher.assignments.index :teacher="$teacher" />
        </div>
    </x-myteacher.index>
</x-layouts.app>
