<x-layouts.app>
    <div class="mx-auto">
        <div class="py-4 grid gap-y-8">
            <h1 class="text-2xl font-medium">{{ $flashcardSet->lesson->title }} flashcards</h1>
            @foreach($flashcardSet->flashcards as $flashcard)
            <form action="{{ route('admin.flashcards.update', ['flashcardId' => $flashcard->id] )}}" method="POST"
                  class="grid grid-cols-6 gap-y-8 w-full">
            @csrf
                <div class="col-span-2">
                    <div class="text-lg font-medium"><input type="text" name="term" value="{{ $flashcard->term }}"></div>
                    <div class="text-sm"><input type="text" name="definition" value="{{ $flashcard->definition }}"></div>
                    @if($flashcard->context)
                        <div class="text-sm"><input type="text" name="context" value="{{ $flashcard->context ?? '' }}">
                        </div>
                    @endif
                </div>
                <div class="col-span-2">
                    <img src="{{ $flashcard->image_url }}" alt="{{ $flashcard->term }}" class="w-64 h-64 mb-6">
                    <input value="{{ $flashcard->image_url }}" type="text" name="image_url" class="w-64">
                </div>
                <div class="col-span-1">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Update
                    </button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</x-layouts.app>
