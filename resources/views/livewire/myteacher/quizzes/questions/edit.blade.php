<div wire:poll.visible x-data="{ editMode: @entangle('editMode').live, answerEditing: false, answers: @entangle('answers').live, newAnswers: @entangle('newAnswers').live }">
    <div class="mb-4 flex">
        <textarea id="text" wire:model="text" value="{{ $question->text }}" class="w-1/2 shadow-sm mt-1 mr-4 block sm:text-sm border border-gray-300 rounded-md" placeholder=""></textarea>
        <select id="type" wire:model="type" value="{{ $question->type }}" class="w-2/5 shadow-sm mt-1 mr-4 block sm:text-sm border border-gray-300 rounded-md" placeholder="">
            <option value="radio">Multiple Choice or True/False</option>
            <option value="text">Fill in the blank</option>
        </select>
        <input type="text" id="points" wire:model="possiblePoints" value="{{ $question->possible_points }}" class="w-1/8 shadow-sm mt-1 block sm:text-sm border border-gray-300 rounded-md"></input>
    </div>

    <div>
        @if($question->answers)
            @foreach($question->answers as $answer)
                <div>
                    <livewire:myteacher.quizzes.answers.edit :answer="$answer" :wire:key="$answer->id" />
                </div>
            @endforeach
        @endif
    </div>

    <div class="flex my-4">
        <input type="text" id="answerText" wire:model.live="newAnswerText" value="" class="w-3/5 shadow-sm mt-1 mr-4 sm:text-sm border border-gray-300 rounded-md" placeholder="Answer option"></input>
        @error('answerText') <span class="error">{{ $message }}</span> @enderror
        <input type="text" id="pointValue" wire:model.live="newAnswerPointValue" value="" class="w-1/5 shadow-sm mt-1 sm:text-sm border border-gray-300 rounded-md" placeholder="Point value"></input>
        @error('pointValue') <span class="error">{{ $message }}</span> @enderror
        <button @click="answerEditing = true" wire:click="saveNewAnswerChoice" class="btn btn-sm btn-light w-1/5 ml-4 my-1">Save</button>
    </div>

    <button wire:click="deleteQuestion" class="btn btn-dark float-left">Delete</button>
    <button wire:click="updateQuestion" class="btn btn-primary float-right">Update</button>

</div>

