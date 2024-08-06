<x-layouts.lessons.show :course="$course" :lesson="$lesson" :registration="$registration">
<x-slot name="title">
  Vocabulary Words
</x-slot>
<x-slot name="content">
    <div>
        @isset($lesson->flashcardSet)
              <div class="mb-3 text-center">
                <a href="{{ route('dashboard.lessons.flashcards.index', ['locale' => session('locale'),
                    'courseId' => $course->id,
                    'lessonId' => $lesson->id])
                    }}" target="_blank" type="button" class="relative inline-flex items-center rounded-md bg-blue-400
                        px-4 py-3 text-base font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline
                        focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    View flashcards</a>
              </div>
        @endisset
      @foreach($vocabularyWords as $vocabularyWord)
          <div class="mb-4 pb-5 border-b-2 border-dotted border-gray-200">
              <div class="mb-3 text-2xl font-bold">{{ $loop->index + 1}}. {{ $vocabularyWord->word }}</div>
              <p class="mb-3">{{ ucfirst($vocabularyWord->definition) }}</p>
              @foreach($vocabularyWord->writtenExamples as $example)
                <div class="ml-4">
                  "<em>{{ $example->example }}</em>"
                </div>
              @endforeach
          </div>
      @endforeach
    </div>
</x-slot>
</x-layouts.lessons>
