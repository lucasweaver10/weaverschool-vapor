<x-layouts.courses.show :course="$course">
    <x-slot name="title">
    </x-slot>
    <x-slot name="content">
                    <div class="p-6">
                        <div class="text-2xl font-bold mb-3">Course Progress</div>
                        <div class="">Lessons completed: {{ count($progress->course->lessonProgresses->where('completed_at')) }}</div>
                        <div class="">Course grade: {{ $progress->course_grade }}</div>
                    </div>
    </x-slot>
</x-layouts.courses.show>