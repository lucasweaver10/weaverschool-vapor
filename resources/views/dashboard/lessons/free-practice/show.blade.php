<x-layouts.lessons.show :course="$course" :lesson="$lesson" :registration="$registration">
<x-slot name="title">
  Free Practice
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
          <div x-data="{ showHint: false }" class="mb-4">{{ $question->number }}. {!! preg_replace('/\.{4}/', '<input type="text" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs
              border-gray-300 rounded-md" name="answer['.$loop->iteration.']">', $question->text) !!}
                <div class="relative inline-block group">
                  <svg @hover="showHint = !showHint" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 align-middle inline">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                  </svg>
                  <div class="absolute z-20 hidden group-hover:block bg-white border border-gray-300 shadow-lg px-3 py-2 rounded-md min-w-sm w-56 top-0 left-full ml-2">
                      {{ $question->hint }}
                  </div>
                </div>
          </div>
        @endforeach
      @elseif($exercise->format == 'Group')
        @foreach($exercise->questions as $question)
          {!! preg_replace('/\.{4}/', '<input type="text" class="mb-4 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:max-w-xs
              border-gray-300 rounded-md" name="answer['.$loop->iteration.']">', $question->text) !!}
            <div class="relative inline-block group">
                <svg @hover="showHint = !showHint" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 align-middle inline">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                </svg>
                <div class="absolute z-20 hidden group-hover:block bg-white border border-gray-300 shadow-lg px-3 py-2 rounded-md min-w-sm w-56 top-0 left-full ml-2">
                    {{ $question->hint }}
                </div>
            </div>
        @endforeach
      @endif
        <div class="block">
            <button type="submit" class="bg-blue-400 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded">Submit</button>
        </div>
    </form>
  </div>
</x-slot>
</x-layouts.lessons.show>
