<x-layouts.app>
    <x-dashboard.index :user="$user">
        <x-slot name="title">
            Assignments
        </x-slot>
            <livewire:dashboard.assignments.index :user="$user"/>
    </x-dashboard.index>
    <x-alerts.success >
    </x-alerts.success>
</x-layouts.app>
