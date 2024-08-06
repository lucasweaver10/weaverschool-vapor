<div x-data="{ status: @entangle('status').live }">
{{--    <h4 class="mb-4">Quizzes</h4>--}}
    <nav class="hidden md:flex items-center justify-between text-gray-400 text-xs mb-4">
        <ul class="flex font-normal pb-3 space-x-10">
            <li><span role="button" wire:click.prevent="setStatus('open') " href="#" class="pb-3 hover:border-blue-400 hover:text-gray-900" :class="status === 'open' ? 'border-b-2 border-gray-900 text-gray-900' : '' ">Open</span></li>
            <li><span role="button" wire:click.prevent="setStatus('graded') " href="#" class="pb-3 hover:border-blue-400 hover:text-gray-900" :class="status === 'graded' ? 'border-b-2 border-gray-900 text-gray-900' : '' ">Graded</span></li>
        </ul>
    </nav>

    <div x-cloak x-show=" status === 'open' ">
        @foreach ($openQuizzes as $assignedQuiz)
            <div>
                <livewire:dashboard.courses.quizzes.show :assignedQuiz="$assignedQuiz" :wire:key="$assignedQuiz->id" />
            </div>
        @endforeach
    </div>
    <div x-cloak x-show=" status === 'graded' ">
        @foreach ($gradedQuizzes as $assignedQuiz)
            <div>
                <livewire:dashboard.courses.quizzes.graded.show :assignedQuiz="$assignedQuiz" :wire:key="$assignedQuiz->id" />
            </div>
        @endforeach
    </div>
</div>
