<x-layouts.lessons.show :course="$course" :lesson="$lesson" :registration="$registration">
<x-slot name="title">
  Guided Practice
</x-slot>
<x-slot name="content">
  <h2 class="text-2xl">{{ $exercise->name  }}</h2>
    @if($exercise->description)<p class="text-base">{{ $exercise->description }}</p>@endif
  <div class="mt-4">
    <form action="/{{ session('locale')}}/dashboard/lessons/exercises/grade-exercise/{{ $lesson->id }}" method="POST">
    @csrf
    <input type="hidden" name="exercise_id" value="{{ $exercise->id }}">
      @if($exercise->format == 'Singular')
        @foreach($exercise->questions as $question)
          <div class="pb-5 px-2 mb-4 border-b-2 border-dotted border-gray-200">
            <div class="mb-4"><em>{{ $question->hint }}</em></div>
            <div class="mb-4 font-bold">{{ $question->number }}. {!! preg_replace('/\.{4}/', '<input type="text" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs
                border-gray-300 rounded-md" name="answer['.$loop->iteration.']">', $question->text) !!}
            </div>
            <div><em>{{ $question->explanation }}</em></div>
          </div>
        @endforeach
      @elseif($exercise->format == 'Group')
        @foreach($exercise->questions as $question)
          {!! preg_replace('/\.{4}/', '<input type="text" class="mb-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs
              border-gray-300 rounded-md" name="answer['.$loop->iteration.']">', $question->text) !!}
        @endforeach
      @endif
        <div class="block">
            <button type="submit" class="bg-blue-400 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded">Submit</button>
        </div>
    </form>
  </div>
</x-slot>
</x-layouts.lessons>
