<div x-data="{ status: @entangle('status').live }">
{{--    <h4 class="mb-4">Assignments</h4>--}}
    <nav class="hidden md:flex items-center justify-between text-gray-400 text-xs mb-4">
        <ul class="flex font-normal pb-3 space-x-10">
            <li><span role="button" wire:click.prevent="setStatus('open') " href="#" class="pb-3 hover:border-gray-400 hover:text-gray-900" :class="status === 'open' ? 'border-b-2 border-gray-600 text-gray-900' : '' ">Open</span></li>
            <li><span role="button" wire:click.prevent="setStatus('completed') " href="#" class="pb-3 hover:border-gray-400 hover:text-gray-900" :class="status === 'completed' ? 'border-b-2 border-gray-600 text-gray-900' : '' ">Completed</span></li>
            <li><span role="button" wire:click.prevent="setStatus('graded') " href="#" class="pb-3 hover:border-gray-400 hover:text-gray-900" :class="status === 'graded' ? 'border-b-2 border-gray-600 text-gray-900' : '' ">Graded</span></li>
        </ul>
    </nav>

    <div>
            @foreach ($assignments as $assignment)
                <div>
                    <livewire:dashboard.courses.assignments.show :assignment="$assignment" :wire:key="$assignment->id" />
                </div>
            @endforeach
    </div>
</div>
