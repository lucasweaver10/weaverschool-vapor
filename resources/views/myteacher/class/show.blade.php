<x-layouts.app>

<div class="section bg-primary py-4 mb-2">
  <div class="container">
    <div class="row" id="dashboard-header">
        <div class="col-12"><h1 class="text-white">MyTeacher</h1></div>
        <div class="col-12"><a class="text-white" href="/myteacher"><< Back</a></div>
    </div>
  </div>
</div>
<x-alerts.success/>
<div class="container pb-5">
  <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
    <div class="row mb-4">
      <div class="col-md-10">
        <div class="my-3">
          <h3 class="">{{ $registration->private_lessons_name }}</h3>
          <p class="mb-2">Student Name: {{ $registration->user_name }}</p>
          <p class="mb-2">Hours Remaining: {{ $registration->total_hours - $registration->hours_completed }}</p>
        </div>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-md-10">
        <form action="{{ url('/api/registration/update', ['id' => $registration->id]) }}" method="POST">
          @method('PATCH')
          <h4 class="mt-4 mb-2">Add completed hours</h4>
          <label for="lesson_hours" class="form-label">Additional lesson hours completed:</label>
          <input class="form-control" id="lesson_hours" name="lesson_hours" type="text" style="width: 20rem;">
          <button type="submit" class="btn btn-lg btn-primary mt-3">Add hours</button>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10">
        {{-- <livewire:assignment-creator :registration="$registration"/> --}}
        <form action="/api/assignments/store" method="POST"  enctype="multipart/form-data">
          <h4 class="mt-4 mb-2">Add an assignment</h4>
            <label for="assignment_title" class="form-label">Title:</label>
            <input class="form-control mb-2" id="assignment_title" name="title" type="text" style="width: 20rem;">

            <label for="assignment_content" class="form-label">Content:</label>
            <textarea class="form-control mb-2" id="assignment_content" name="content" type="text" style="width: 20rem;"></textarea>

            <label for="due_date" class="form-label">Due Date:</label>
            <input class="form-control mb-2" type="text" id="datepicker" name="selected_date" style="width: 20rem;" autocomplete="off">

            <label for="file" class="form-label mt-3">Add attachments:</label>
            <div class="input-group mt-1 mb-3">
                <input type="file" multiple name="attachments[]">
            </div>

            <input type="hidden" id="teacherId" name="teacher_id" value="{{ $registration->teacher_id }}">
            <input type="hidden" id="userId" name="user_id" value="{{ $registration->user_id }}">
            <input type="hidden" id="registrationId" name="registration_id" value="{{ $registration->id }}">

          <button type="submit" class="btn btn-lg btn-primary mt-3">Add assignment</button>
        </form>
      </div>
    </div>
  </div>

  <script src="pikaday.js"></script>
  <script>
    var picker = new Pikaday({
      field: document.getElementById('datepicker'),
      format: 'D/M/YYYY',
      toString(date, format) {
          // you should do formatting based on the passed format,
          // but we will just return 'D/M/YYYY' for simplicity
          const day = date.getDate();
          const month = date.getMonth() + 1;
          const year = date.getFullYear();
          return `${year}-${month}-${day}`;
      },
    });
</script>
</div>



</x-layouts.app>
