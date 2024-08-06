<div class="mb-5" x-data="{ completed: @entangle('completed').live, }">
    <div class="mb-4">
      <h3 class="mb-2">{{ $assignment->title }}</h3>
      <p>{{ $assignment->content }}</p>
      <p class="small">Assigned {{ $assignment->created_at->diffForHumans() }}</p>
      <h6 x-show=" completed === 0 ">Due: {{ $assignment->due_date }}</h6>
      <h6 x-show=" completed != 0 "> Status: Complete</h6>
    </div>
    @if (count($assignment->attachments) != 0)
      <div class="mb-4">
        <h5>Attachments:</h5>
        <ul>
      @foreach ($assignment->attachments as $attachment)
      <li>
        <a class="mb-2" target="blank" href="/api/attachments/{{$attachment->filename}}">{{ $attachment->filename }}</a>
      </li>
      @endforeach
        </ul>
      </div>
    @endif

    @if(count($assignment->completedHomeworks) != 0)
      <div class="mb-4">
        <h5>Completed Homework:</h5>

      @foreach ($assignment->completedHomeworks as $homework)
        <a class="mb-2" target="blank" href="/api/homework/{{$homework->filename}}">{{ $homework->filename }}</a>
      @endforeach

      </div>
    @endif

      <div x-show=" completed === 0 ">
        <livewire:homework-uploader :assignmentId="$assignment->id" />
        <livewire:assignment-completer :assignmentId="$assignment->id" />
      </div>
</div>
