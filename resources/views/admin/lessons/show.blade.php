<x-layouts.app>
<div class="container mx-auto">
    <div class="py-4">
        <h1 class="text-2xl font-medium">Lesson {{ $lesson->lesson_number }}</h1>
        <h2 class="text-lg font-medium">{{ $lesson->title }}</h2>
        <p class="py-2">{{ $lesson->description }}</p>
        <!-- make a form for making flashcards for this lesson's vocabulary words -->
        <form action="{{ route('admin.flashcards.store') }}" method="POST">
            @csrf
            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Make Flashcards</button>
        </form>
{{--        <p class="py-2">Course: {{ $lesson->course->name }}</p>--}}
    </div>
</div>
</x-layouts.app>
