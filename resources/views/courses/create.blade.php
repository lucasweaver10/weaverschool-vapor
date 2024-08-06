<x-layouts.app>
{{--<x-app.meta-description content=""/>--}}
<div class="bg-gray-50 min-h-screen pt-8 px-32 pb-8">
    <div class="my-5">
      <h1>Add a Course</h1>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-lg-5">
          <form action="/courses" method="POST" enctype="multipart/form-data">
            @csrf


                <div class="form-group">
                  <label for="">Course Name</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">About</label>
                  <input type="text" class="form-control" name="about" id="about" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Subject</label>
                  <select class="form-control" name="subject" id="subject">
                    <option>Academic</option>
                    <option>Business</option>
                    <option>General</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Experience</label>
                  <select class="form-control" name="experience" id="experience">
                    <option>In-Person</option>
                    <option>Online</option>
                    <option>eLearning</option>
                    <option>Corporate</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Level</label>
                  <select class="form-control" name="level" id="level">
                    <option>Beginner</option>
                    <option>Intermediate</option>
                    <option>Advanced</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Price</label>
                  <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Teacher</label>
                  <input type="text" class="form-control" name="teacher_id" id="teacher_id" aria-describedby="helpId" placeholder="">
                </div>
{{--                <div class="form-group">--}}
{{--                  <label for="">Lesson Plan</label>--}}
{{--                  <select class="form-control" name="lesson_plan_id" id="lesson_plan_id">--}}
{{--                    <option value="0">0</option>--}}
{{--                    <option value="1">1</option>--}}
{{--                  </select>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                  <label for="">Plans</label>--}}
{{--                  <select multiple class="form-control" name="plan_id[]" id="plan_id">--}}
{{--                    @foreach ($plans as $plan)--}}
{{--                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>--}}
{{--                    @endforeach--}}
{{--                  </select>--}}
{{--                </div>--}}
                <div class="form-group">
                  <label for="">Focus</label>
                  <input type="text" class="form-control" name="focus" id="focus" aria-describedby="helpId" placeholder="">
                </div>
{{--                <div class="form-group">--}}
{{--                  <label for="">Day</label>--}}
{{--                  <select class="form-control" name="day" id="day">--}}
{{--                    <option value="Monday">Monday</option>--}}
{{--                    <option>Tuesday</option>--}}
{{--                    <option>Wednesday</option>--}}
{{--                    <option>Thursday</option>--}}
{{--                    <option>Friday</option>--}}
{{--                  </select>--}}
{{--                </div>--}}

                {{-- <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                    </div>
                </div> --}}
    </div>

    <div class="col-5">
{{--      <div class="form-group">--}}
{{--        <label for="">Weekly Lessons</label>--}}
{{--        <input type="text" class="form-control" name="weekly_lessons" id="weekly_lessons" aria-describedby="helpId" placeholder="">--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="">Total Lessons</label>--}}
{{--        <input type="text" class="form-control" name="total_lessons" id="total_lessons" aria-describedby="helpId" placeholder="">--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="">Hours per Lesson</label>--}}
{{--        <input type="text" class="form-control" name="lesson_hours" id="lesson_hours" aria-describedby="helpId" placeholder="">--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="">Weekly Hours</label>--}}
{{--        <input type="text" class="form-control" name="weekly_hours" id="weekly_hours" aria-describedby="helpId" placeholder="">--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="">Total Hours</label>--}}
{{--        <input type="text" class="form-control" name="total_hours" id="total_hours" aria-describedby="helpId" placeholder="">--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="">Total Weeks</label>--}}
{{--        <input type="text" class="form-control" name="total_weeks" id="total_weeks" aria-describedby="helpId" placeholder="">--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="">Audience</label>--}}
{{--        <input type="text" class="form-control" name="audience" id="audience" aria-describedby="helpId" placeholder="">--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="">Max Size</label>--}}
{{--        <input type="text" class="form-control" name="max_size" id="max_size" aria-describedby="helpId" placeholder="">--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="">Time</label>--}}
{{--        <input type="text" class="form-control" name="time" id="time" aria-describedby="helpId" placeholder="">--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="">Start Date</label>--}}
{{--        <input type="date" class="form-control" name="start_date" id="start_date" aria-describedby="helpId" placeholder="">--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="">End Date</label>--}}
{{--        <input type="date" class="form-control" name="end_date" id="end_date" aria-describedby="helpId" placeholder="">--}}
{{--      </div>--}}
      <div class="form-group">
        <label for="">Image</label>
        <input type="text" class="form-control" name="image" id="image" aria-describedby="helpId" placeholder="">
      </div>
      <div class="form-group">
        <label for="">Video</label>
        <input type="text" class="form-control" name="video" id="video" aria-describedby="helpId" placeholder="">
      </div>
      <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-lg btn-primary">
    </div>
    </div>
  </form>

  </div>
</div>

</x-layouts.app>
