<x-layouts.lessons.show :course="$course" :lesson="$lesson" :registration="$registration">
<x-slot name="title">
  Vocabulary Practice
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
        <ul>
          @foreach($vocabularyWords as $vocabularyWord)
              <li>
                <a href="{{ url()->current() }}/{{ $vocabularyWord->id }}">{{ $vocabularyWord->word }}</a>
              </li>
          @endforeach
        </ul>
    </div>
</x-slot>
</x-layouts.lessons>
