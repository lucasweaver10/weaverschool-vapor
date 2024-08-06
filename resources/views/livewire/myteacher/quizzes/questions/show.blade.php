<div x-data="{ editMode: @entangle('editMode').live }">
    <div x-show=" editMode === false">
        {{ $number }}. {{ $question->text }}
        <ul>
            @foreach($question->answers as $answer)
                <li class="ml-2 my-1 text-sm">{{ $answer->text }} @if($answer->point_value != '0')(Correct)@endif</li>
            @endforeach
        </ul>
        <button @click="editMode = !editMode" class="btn btn-sm btn-light float-right">Edit</button>
    </div>
    <div x-cloak x-show=" editMode === true">
        <livewire:myteacher.quizzes.questions.edit :question="$question" />
        <button @click="editMode = !editMode" class="btn btn-light float-right mr-2">Cancel</button>
    </div>
    <x-alerts.success>
    </x-alerts.success>
</div>
