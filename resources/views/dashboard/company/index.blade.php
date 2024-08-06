<x-layouts.app>
    <x-dashboard.index title="Company Management" :user="$user">
        <livewire:dashboard.company.index :user="$user"/>
    </x-dashboard.index>
</x-layouts.app>
