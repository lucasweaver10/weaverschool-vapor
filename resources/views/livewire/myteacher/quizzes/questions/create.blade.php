<div x-init x-data="{ editMode: false, answerEditing: false, answers: @entangle('answers').live, text: @entangle('text').live, type: @entangle('type').live, points: @entangle('points').live  }">
    <div class="mb-4 flex">
            <textarea id="text" wire:model.live="text" value="" class="w-1/2 shadow-sm mt-1 mr-4 block sm:text-sm border border-gray-300 rounded-md" placeholder="Question"></textarea>
            @error('text') <span class="error">{{ $message }}</span> @enderror
            <select id="number" wire:model.live="type" class="w-2/5 shadow-sm mt-1 mr-4 block sm:text-sm border border-gray-300 rounded-md" placeholder="">
                <option value="radio">Multiple Choice or True/False</option>
                <option value="text">Fill in the blank</option>
            </select>
        <input type="text" id="points" wire:model.live="points" value="1" class="w-1/8 shadow-sm mt-1 block sm:text-sm border border-gray-300 rounded-md" placeholder="Possible points"></input>
        @error('points') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4 flex">
        @if($answers)
            <ul>
                @foreach($answers as $answer)
                    <li class="text-sm">{{ $answer['answer_text'] }} @if($answer['point_value'] !== '0')(Correct)@endif</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="mb-4 flex">
        <div class="flex w-full">
            <input type="text" id="answerText" wire:model="answerText" value="" class="w-3/4 shadow-sm mt-1 mr-4 sm:text-sm border border-gray-300 rounded-md" placeholder="Answer option"></input>
            @error('answerText') <span class="error">{{ $message }}</span> @enderror
            <input type="text" id="pointValue" wire:model="pointValue" value="" class="w-1/4 shadow-sm mt-1 sm:text-sm border border-gray-300 rounded-md" placeholder="Point value"></input>
            @error('pointValue') <span class="error">{{ $message }}</span> @enderror
            <button wire:click="saveAnswerChoice" class="btn btn-sm btn-light ml-3 mt-1">Save</button>
        </div>
    </div>

    <button x-show="count(answers) > 0" wire:click="saveQuestion" class="btn btn-primary float-right">Save Question</button>

</div>

