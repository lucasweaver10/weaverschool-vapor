<x-layouts.app>
    <x-myteacher.index>
        <x-slot name="title">
            Quizzes
        </x-slot>
        <div class="w-full flex">
            <div class="float-right ml-auto">
            <a href="/myteacher/quizzes/create" class="btn-primary btn float-right">Create</a>
            </div>
        </div>
        <div>
            <livewire:myteacher.quizzes.index />
        </div>
    </x-myteacher.index>
</x-layouts.app>
