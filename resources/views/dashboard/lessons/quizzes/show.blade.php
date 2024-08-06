<x-layouts.lessons.show :course="$course" :lesson="$lesson" :quiz="$quiz" :registration="$registration">
<x-slot name="title">
  Quiz
</x-slot>
<x-slot name="content">
  <h2 class="text-2xl">{{ $quiz->name  }}</h2>
  <div class="mt-4">
    <livewire:dashboard.quizzes.show :quiz="$quiz"/>
  </div>
</x-slot>
</x-layouts.lessons>
