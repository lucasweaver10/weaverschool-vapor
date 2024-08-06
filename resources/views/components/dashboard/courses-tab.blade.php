<div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
    <div class="row">
        <div class="col-md-8">
          @if(count($registrations) === 0)
            @if($level !== null)
            <div class="card mb-5">
              <div class="card-header"><h4 class=text-center>No Courses</h4></div>
                <div class="card-body"><p class="text-center">You haven't registered for any courses yet. Please register for the course recommended for you based on your level test.</p>
              </div>
            </div>
            @endif
            @if($level === null)
            <div class="card mb-5">
              <div class="card-header"><h4 class=text-center>No Courses</h4></div>
                <div class="card-body"><p class="text-center">You haven't registered for any courses yet. Please take your level test to find out which course is recommended for you.</p>
                </div>
              </div>
            </div>
            @endif
            @else
            @foreach($registrations as $registration)
              @if($registration->type === 'Group Course')
                <div class=" mb-5">
                    <div class="">
                        <button type="button" class="float-right btn" style="flex-wrap: wrap; border: 0px; color: #ffffff;" data-toggle="modal" data-target="#deleteModal" data-placement="top" title="Delete this registration."><jam-close-rectangle-f/></button>
                        <h4 class="card-title text-center mb-0">{{$registration->course_name}} </h4>
                    </div>
                      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Are you sure you want to delete this registration?</h5>
                            </div>
                            <div class="modal-body">
                              <p>Clicking yes will delete your registration so you can choose a different one.</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                              <form action="{{ url('/api/registration/destroy', ['id' => $registration->id]) }}" method="POST">
                                @method('DELETE')
                              <button type="submit" class="btn btn-primary">Delete my registration</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="">
                    @if($registration->start_date !== null)
                        <p class="card-subtitle mb-2 text-muted text-center">Start date: {{$registration->start_date}}</p>
                    @endif
                        <p class="card-subtitle text-center mb-2">Teacher: Hilary Porter</p>
                        <p class="text-center">Contact: <a href="mailto:hilary@weaverenglish.nl">hilary@weaverenglish.nl</a></p>
                        <p class="text-center">Plan: {{ $registration->plan_name }}</p>
                        <div class="mx-auto">
                        </div>
                    </div>
                </div>
              @else
                <div class="mb-5">
                  <div class="">
                      <button type="button" class="float-right btn" style="flex-wrap: wrap; border: 0px; color: #ffffff;" data-toggle="modal" data-target="#deleteModal" data-placement="top" title="Delete this registration."><jam-close-rectangle-f/></button>
                      <h2 class="card-title mb-3">{{$registration->private_lessons_name}}</h2>
                  </div>
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Are you sure you want to delete this registration?</h5>
                          </div>
                          <div class="modal-body">
                            <p>Clicking yes will delete your registration so you can choose a different one.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                            <form action="{{ url('/api/registration/destroy', ['id' => $registration->id]) }}" method="POST">
                              @method('DELETE')
                            <button type="submit" class="btn btn-primary">Delete my registration</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="">
                    <p class="mb-2">Teacher: {{ $registration->teacher->name }}</p>
                    <p class="">Contact: <a href="mailto:{{ $registration->teacher->email }}">{{ $registration->teacher->email }}</a></p>
                    <p class=" ">Total Hours: {{ $registration->total_hours }}</p>
                    <p class="">Hours Completed: {{ $registration->hours_completed }}</p>
                    {{-- <a href="/teachers/{{ $registration->teacher->id }}/meetings" role="button" class="btn btn-primary mx-auto mt-3">View course</a> --}}
                    <a href="#courseShow" id="courseShow-tab" role="tab" class="btn btn-primary mx-auto mt-3">View course</a>
                  </div>
                </div>
              @endif
            @endforeach
            @endif
        </div>
</div>
