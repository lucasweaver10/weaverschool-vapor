 <div class="bg-white rounded-lg p-4 my-4">
            <h3 class="mb-4">Edit quiz</h3>
                <form wire:submit="update">
                    <div class="mb-4">
                        <label for="quiz-name" class="block text-sm font-medium text-gray-700">
                            Quiz Name
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" wire:model.live="name" id="name" value="{{ $quiz->name }}" class="flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="{{ $quiz->name }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="about" class="block text-sm font-medium text-gray-700">
                            Description
                        </label>
                        <div class="mt-1">
                            <textarea id="description" wire:model.live="description" value="{{ $quiz->description }}" rows="1" class="shadow-sm mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="{{ $quiz->description }}"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Short description about what the quiz covers.
                        </p>
                    </div>

                    <div class="mb-4">
                        <label for="about" class="block text-sm font-medium text-gray-700">
                            Instructions
                        </label>
                        <div class="mt-1">
                            <textarea id="instructions" wire:model.live="instructions" value="{{ $quiz->instructions }}" rows="1" class="shadow-sm mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="{{ $quiz->instructions }}"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Instructions for student.
                        </p>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-danger text-white ml-24" @click="editMode = !editMode">Cancel</a>
                    </div>
                </form>

            <x-alerts.success>
            </x-alerts.success>
</div>
