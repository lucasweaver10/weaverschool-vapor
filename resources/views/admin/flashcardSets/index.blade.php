<x-layouts.app>
    <div class="p-20">
        <div class="mb-5 text-3xl">Flashcard Sets</div>
        <div class="mb-12">
            <ul>
                @foreach($flashcardSets as $set)
                    <li>
                        <a href="/admin/flashcards/sets/{{ $set->id }}">{{ $set->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="mb-4">
            <a href="{{ route('admin.flashcards.sets.create') }}"
               class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                Create
            </a>
        </div>
    </div>
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-3">
            {{ session()->get('message') }}
        </div>
    @endif
</x-layouts.app>
