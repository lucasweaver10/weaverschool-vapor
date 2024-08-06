<x-layouts.app>
    <div class="p-20">
        <div class="mb-5 text-3xl">{{ $flashcardSet->title }}</div>
        <div class="mb-12">
            <ul>
                @foreach($flashcards as $flashcard)
                    <li>
                        <li>{{ $flashcard->term }}: {{ $flashcard->definition }}</li>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="mb-4">
            <a href="{{ route('admin.flashcards.create', $flashcardSet->id) }}"
               class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                Create more flashcards
            </a>
        </div>
    </div>
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-3">
            {{ session()->get('message') }}
        </div>
    @endif
</x-layouts.app>
