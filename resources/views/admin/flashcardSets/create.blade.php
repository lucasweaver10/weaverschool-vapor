<x-layouts.app>
    <div class="p-20">
        Create a Flashcard Set
        <form class="rounded-lg" method="post" action="{{ route('admin.flashcards.sets.store') }}">
            @csrf
            <x-forms.input label="Title" for="title" name="title" type="text" id="title"/>
            <x-forms.textarea label="Description" for="description" name="description" text="" id="description"/>
            <div class="text-right">
                <x-forms.submit-button type="submit" text="Create" />
            </div>
        </form>
    </div>
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-3">
            {{ session()->get('message') }}
        </div>
    @endif
</x-layouts.app>
