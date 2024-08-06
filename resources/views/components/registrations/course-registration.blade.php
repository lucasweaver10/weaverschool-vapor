<div class="tab-pane fade justify-content-center" id="registration" role="tabpanel" aria-labelledby="registration-tab">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-5" style="max-width: 100%;">
                <div class="card-header">
                    <h4 class="card-title mb-0 text-center">Choose Your Course</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/dashboard/register') }}" method="POST">
                        @csrf
                    <div class="form-group">
                        <select class="form-control" id="course_id" name="course_id">
                            @foreach ( $privateLessons as $privateLesson )
                                <option value="{{ $privateLesson->id }}">{{ $privateLesson->name }}</option>
                            @endforeach
                            @foreach ( $courses as $course )
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary" style="width: 100%;">Continue</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>