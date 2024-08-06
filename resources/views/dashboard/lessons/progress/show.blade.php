<x-layouts.lessons.show :course="$course" :lesson="$lesson" :registration="$registration">
<x-slot name="title">
Lesson Progress
</x-slot>
<x-slot name="content">
    <div>
    <div class="text-2xl font-bold mb-3">Lesson Progress</div>
    <ul>
        <li>Guided Practice Grade: {{ $lesson->progress->guided_practice_grade }}</li>
        <li>Free Practice Grade: {{ $lesson->progress->free_practice_grade }}</li>
        <li>Quiz Grade: {{ $lesson->progress->quiz_grade }}</li>
        <li>Lesson Grade: {{ $lesson->progress->lesson_grade }}</li>
    </ul>
    </div>
</x-slot>
</x-layouts.lessons>
