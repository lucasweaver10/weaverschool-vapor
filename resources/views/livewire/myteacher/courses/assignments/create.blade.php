<div x-data="{ selectedData: @entangle('selectedDate').live, selectedRegistrationId: @entangle('selectedRegistrationId').live, selectedGroupId: @entangle('selectedGroupId').live, }">
    <div class="bg-white border border-1 border-gray-300 shadow-sm overflow-hidden sm:rounded-md px-4 mb-5 py-4">
        <label for="assignment_title" class="form-label">Title:</label>
        <input class="form-control mb-2" id="assignment_title" wire:model="title" type="text" style="width: 20rem;">

        <div class="my-4 lg:w-4/5">
            <label for="assignment_content" class="form-label">Content:</label>
            <p class="text-xs">You can use <a href="https://www.w3schools.com/html/html_formatting.asp" target="blank">html</a> to add special formatting to your content.</p>
            <div class="mt-1">
                <textarea rows="4" wire:model="content" id="content" class="shadow-sm focus:ring-indigo-500 focus:border-blue-400 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
            </div>
        </div>

        <label for="due_date" class="form-label">Due Date:</label>
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
               wire:model.live="selectedDate" class="form-control mb-2" type="text" id="datepicker" style="width: 20rem;" autocomplete="off">

        <label for="file" class="form-label mt-3">Add attachments:</label>
        <div class="input-group mt-1 mb-4">
            <input type="file" wire:model.live="attachments">
            <div wire:loading wire:target="attachments">Working...</div>
        </div>

        <label for="student" class="form-label">Student:</label>
        <select class="form-control mb-2" id="student" x-model="selectedRegistrationId" wire:model.live="selectedRegistrationId" style="width: 20rem;">
            <option>Select a student</option>
            @foreach($registrations as $registration)
                <option value="{{ $registration->id }}">{{ $registration->user_name }}</option>
            @endforeach
        </select>

        <div class="my-3 text-sm">Or</div>

        <label for="student" class="form-label">Group:</label>
        <select class="form-control mb-2" id="group" x-model="selectedGroupId" wire:model="selectedGroupId" style="width: 20rem;">
            <option>Select a group</option>
            @foreach($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>

        <div x-show="selectedRegistrationId !== null">
            <button wire:click="store" class="btn btn-lg btn-primary mt-3">Add assignment</button>
        </div>

        <div x-show="selectedGroupId !== null">
            <button wire:click="storeGroupAssignments" class="btn btn-lg btn-primary mt-3">Add group assignment</button>
        </div>

    </div>

    <x-alerts.success>
    </x-alerts.success>

    <script src="pikaday.js"></script>
</div>
