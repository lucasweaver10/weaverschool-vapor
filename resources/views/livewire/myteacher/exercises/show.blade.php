<div x-data="{ exerciseEditMode: @entangle('exerciseEditMode').live }">
    <div class="bg-blue-400 flex min-h-screen">
        <a href="/myteacher/exercises"><svg class="h-6 w-6 mt-3 ml-4 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
        </svg></a>
        <div class="relative flex flex-col justify-center w-full my-5 mx-24">
            <div class="w-full bg-white rounded-lg p-4 mt-3 mb-3">
                <div x-show="exerciseEditMode === false">
                    <h3>{{ $exercise->name }}</h3>
                    <p>{{ $exercise->description }}</p>
                    <button @click="exerciseEditMode = !exerciseEditMode" class="btn btn-sm btn-light float-right">Edit</button>
                </div>
                <div x-cloak x-show="exerciseEditMode === true">
                    <div class="mb-4">
                        <label for="exercise-name" class="block text-sm font-medium text-gray-700">
                            Exercise Name
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" wire:model="name" id="name" class="flex-1 block w-full rounded-md sm:text-sm border-gray-300"></input>
                        </div>
                    </div>
                    <label for="about" class="block text-sm font-medium text-gray-700">
                        Description
                    </label>
                    <div class="mt-1">
                        <textarea id="description" wire:model="description" rows="1" class="mb-4 shadow-sm mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                    </div>
                    <button wire:click="updateExercise" class="btn btn-sm btn-primary float-right">Update</button>
                    <button @click="exerciseEditMode = !exerciseEditMode" class="btn btn-sm btn-light float-right mr-3">Cancel</button>
                </div>
            </div>

            @foreach($exercise->questions as $question)
                <div class="bg-white w-full rounded-lg p-4 mt-3 mb-3">
                    <livewire:myteacher.exercises.questions.show :question="$question" :wire:key="$question->id" :number=" $loop->index + 1 "/>
                </div>
            @endforeach

            <div class="w-full bg-white rounded-lg p-4 my-3">
                <livewire:myteacher.exercises.questions.create :exercise="$exercise"/>
            </div>

            <div class="mx-auto mt-4">
                <a class="btn btn-light btn-lg" href="/myteacher/exercises">
                    <svg class="h-5 w-5 inline mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                    </svg>
                    Back to Exercises</a>
            </div>

        </div>
        <x-alerts.success></x-alerts.success>
    </div>
</div>
