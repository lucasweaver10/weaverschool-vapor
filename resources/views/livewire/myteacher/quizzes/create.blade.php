<div class="bg-white rounded-lg border border-1 border-gray-100 p-4 mt-4">

        <div class="mb-4">
            <label for="quiz-name" class="block text-sm font-medium text-gray-700">
                Quiz Name
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <input type="text" wire:model.live="name" id="name" class="flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="My new quiz">
            </div>
        </div>

    <div class="mb-4">
        <label for="about" class="block text-sm font-medium text-gray-700">
            Description
        </label>
        <div class="mt-1">
            <textarea id="description" wire:model.live="description" rows="1" class="shadow-sm mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="This tests your skills over the present perfect."></textarea>
        </div>
    </div>

    <div class="mb-4">
        <label for="about" class="block text-sm font-medium text-gray-700">
            Instructions
        </label>
        <div class="mt-1">
            <textarea id="instructions" wire:model.live="instructions" rows="1" class="shadow-sm mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Mark the best choice for each answer."></textarea>
        </div>
    </div>

    <div class="mb-4">
        <label for="quiz-name" class="block text-sm font-medium text-gray-700">
            Lesson Id
        </label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <select wire:model.live="lesson_id">
                <option value="">Choose a lesson</option>
                @foreach($lessons as $lesson)
                    <option value="{{ $lesson->id }}">{{ $lesson->title }} ({{ $lesson->course->name }})</option>
                @endforeach
            </select>
        </div>
    </div>

    <div>
        <button class="btn btn-primary btn-std" wire:click="createQuiz">Save Test</button>
    </div>

    <x-alerts.success>
    </x-alerts.success>
</div>
