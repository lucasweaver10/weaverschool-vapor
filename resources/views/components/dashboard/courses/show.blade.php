<div class="mb-4" style="max-width: 34rem;">
  <h1 class="mb-4">{{ $registration->private_lessons_name }}</h1>
    <div class="">
        <p class=" mb-2">Teacher: {{ $registration->teacher->name }}</p>
        <p class="mb-2">Hours Remaining: {{ $registration->total_hours - $registration->hours_completed }}</p>
        <p class="mb-2">Zoom  Link: </p>
    </div>
</div>

<div>
<span class="w-1/3"><h2 class="mt-4 mb-4">Assignments</h2></span>
<x-select-tw/>
  {{-- <livewire:assignments-filter /> --}}


@if( count($registration->assignments) > 0)
  @foreach ($registration->assignments as $assignment)
      <livewire:assignments.index :assignment="$assignment" wire:key="{{ $loop->index }}"/>
  @endforeach
@else
  <div class="my-2">
    <p>No assignments yet.</p>
  </div>
@endif
</div>