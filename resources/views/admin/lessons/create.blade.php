<x-layouts.app>
    <form method="post" action="{{ route('lessons.store') }}" class="bg-white p-6 rounded-lg">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="lesson_number">
                Lesson Number
            </label>
            <input
                class="border border-gray-400 p-2 w-full"
                type="text"
                id="lesson_number"
                name="lesson_number"
                required
            >
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="title">
                Title
            </label>
            <input
                class="border border-gray-400 p-2 w-full"
                type="text"
                id="title"
                name="title"
                required
            >
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="description">
                Description
            </label>
            <textarea
                class="border border-gray-400 p-2 w-full"
                id="description"
                name="description"
                required
            ></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="course_id">
                Course
            </label>
            <select
                class="border border-gray-400 p-2 w-full"
                id="course_id"
                name="course_id"
                required
            >
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-between items-center">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Create Lesson
            </button>
            <a href="{{ route('lessons.index') }}" class="text-blue-500 hover:underline">
                Back to Lessons
            </a>
        </div>
    </form>
</x-layouts.app>
