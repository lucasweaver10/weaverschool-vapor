<div class="tab-pane  fade justify-content-center show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            @foreach ($registrations as $registration)
            <div class="card mb-4 mx-auto" style="max-width: 34rem;">
                <div class="card-header">
                    <h4 class="card-title text-center mb-0">{{ $registration->private_lessons_name }}</h4>
                </div>
                <div class="card-body text-center">
                    <p class="card-subtitle mb-2 text-center">Student Name: {{ $registration->user_name }}</p>
                    <p class="card-subtitle text-center mb-2">Hours Remaining: {{ $registration->total_hours - $registration->hours_completed }}</p>

                    <a class="btn btn-lg btn-primary mt-3" href="/myteacher/courses/{{ $registration->id }}">Manage</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
