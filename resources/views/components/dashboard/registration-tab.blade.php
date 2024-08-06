<div class="tab-pane fade" id="registration" role="tabpanel" aria-labelledby="registration-tab">
    <div class="row text-center">
        <div class="col-xl-12 col-lg-12 col-sm-12">
            <div class="nav nav-pills nav-fills mb-3 justify-content-center" id="" role="tablist" aria-orientation="vertical">
                <a class="nav-link pill active" id="pills-online-tab" data-toggle="pill" href="#pills-online" role="tab" aria-controls="v-pills-online" aria-selected="false">Online</a>
                <a class="nav-link pill" id="pills-in-person-tab" data-toggle="pill" href="#pills-in-person" role="tab" aria-controls="pills-in-person" aria-selected="true">In-Person</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane show active fade" id="pills-online" role="tabpanel" aria-labelledby="pills-online-tab">
                    <div class="card mb-5" style="max-width: 100%;">
                        <div class="card-header">
                            <h4 class="card-title mb-0 text-center">Choose Your Course</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/dashboard/register') }}" method="POST">
                                @csrf
                            <div class="form-group">
                                <select class="form-control" id="course_id" name="course_id">
                                    @foreach ($ocourses as $ocourse)
                                        <option value="{{ $ocourse->id }}">{{ $ocourse->name }}</option>
                                    @endforeach
                                    @foreach ($privateLessons as $privateLesson)
                                        <option value="{{ $privateLesson->id }}">{{ $privateLesson->name }}</option>
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
                <div class="tab-pane fade" id="pills-in-person" role="tabpanel" aria-labelledby="pills-in-person-tab">
                    <div class="card mb-5" style="max-width: 100%;">
                        <div class="card-header">
                            <h4 class="card-title text-center">Choose Your Course</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/dashboard/register') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <select class="form-control" id="course_id" name="course_id">
                                        @foreach ($courses as $course)
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
    </div>
</div>
