<div x-data="{ quizMenuOpen: false, selectedRegistrationId: @entangle('selectedRegistrationId').live, selectedGroupId: @entangle('selectedGroupId').live }" class="bg-white rounded-lg border border-1 border-gray-100 p-5">

    <div class="mb-4">
        <label for="quiz" class="form-label">Quiz:</label>
        <select id="quiz" wire:model.live="selectedQuiz" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
            <option>Choose a quiz</option>
            @foreach($quizzes as $quiz)
                <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="student" class="form-label">Student:</label>
        <select id="student" wire:model.live="selectedRegistrationId" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
            <option>Choose a student</option>
            @foreach($registrations as $registration)
                <option value="{{ $registration->id }}">{{ $registration->user->first_name . ' ' . $registration->user->last_name }} - {{ $registration->private_lessons_name ?? $registration->course_name }}</option>
            @endforeach
        </select>


        <div class="my-3 text-sm">Or</div>

        <label for="group" class="form-label">Group:</label>
        <select class="form-control mb-2" id="group" x-model="selectedGroupId" wire:model="selectedGroupId" style="width: 20rem;">
            <option>Select a group</option>
            @foreach($teacher->groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-3 mb-4">
                <label for="due_date" class="">Due Date:</label>
        <input wire:model.blur="selectedDate" x-data x-ref="input"
               x-init="new Pikaday({ field: $refs.input, format: 'D/M/YYYY', toString(date, format)
                  {
                  // you should do formatting based on the passed format,
                  // but we will just return 'D/M/YYYY' for simplicity
                  const day = date.getDate();
                  const month = date.getMonth() + 1;
                  const year = date.getFullYear();
                  return `${year}-${month}-${day}`;
                  }
                })"
               wire:model.live="selectedDate" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
               type="text" id="datepicker" style="width: 20rem;" autocomplete="off" placeholder="Choose a due date">
    </div>

    <div x-cloak x-show="selectedRegistrationId !== null">
        <button wire:click="assignQuiz" class="btn btn-primary btn-block">Assign to student</button>
    </div>

    <div x-cloak x-show="selectedGroupId !== null">
        <button wire:click="assignGroupQuiz" class="btn btn-primary btn-block">Assign to group</button>
    </div>

    <script src="pikaday.js"></script>

    <x-alerts.success>
    </x-alerts.success>
</div>

