<x-layouts.app>
  <x-slot name="title">
    Learn Cultural Note
  </x-slot>
  <x-slot name="description">
    Learn this cultural note
  </x-slot>
<x-layouts.dashboard.show>

<style>
.text-gray-300.prose strong {
    color: inherit; /* Make strong tags inherit the color from the parent */
}
</style>

    <div class="bg-gray-900 min-h-screen flex flex-col items-center px-5 pt-5 pb-12">
        <div class="w-full max-w-4xl">
            <h1 class="text-4xl font-bold text-teal-300 mb-4">
                {{ $note->getTranslation('title', $path->pivot->native_locale) }}
            </h1>
            <x-flashcards.sets.header.back-link text="Back" route="/{{ session('locale', 'en')}}/my/learning-paths/{{ $path->id }}#note-{{ $note->id }}" />
        </div>
        <div class="w-full max-w-4xl">
            @unless(!$note->image_url)
                <img class="mx-auto mt-5 mb-12 w-32 sm:w-48 md:w-64 lg:w-80 h-auto" src="{{ $note->image_url }}" alt="{{ $note->getTranslation('note', $path->pivot->target_locale) }}">
            @endunless            

            <!-- Definition and Explanation Section -->
            <div class="prose prose-2xl text-gray-100 mb-8">               
                <p>{!!  Str::of($note->getTranslation('content', $path->pivot->native_locale))->markdown() !!}</p>                
            </div>        

            <!-- Navigation Buttons -->
            <div class="flex justify-between mt-24">
                @if($prevNote)
                    <a href="{{ route('learning-paths.cultural-notes.show', ['locale' => session('locale'), 'learningPathId' => $path->id, 'noteId' => $prevNote->id ?? $notedId]) }}" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
                        Previous
                    </a>
                @endif
                @if($nextNote)
                    <a href="{{ route('learning-paths.cultural-notes.show', ['locale' => session('locale'), 'learningPathId' => $path->id, 'noteId' => $nextNote->id ?? $noteId]) }}" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
                        Next
                    </a>
                @endif
            </div>
        </div>
    </div>


</x-layouts.dashboard.show>
</x-layouts.app>
