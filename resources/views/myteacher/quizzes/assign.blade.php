<x-layouts.app>
    <x-myteacher.index>
        <x-slot name="title">
            Assign a Quiz
        </x-slot>
        <div class="w-full flex mt-5">
            <livewire:myteacher.quizzes.assign :user="$user" :teacher="$teacher" />
        </div>
    </x-myteacher.index>
</x-layouts.app>
