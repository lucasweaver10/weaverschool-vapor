<div class="card hero-form-card">
  <div class="card-body">
    <h2 class="card-title">Find Your English Course</h2>
    <p class="card-text">Find the English course that will help you improve the English skills you need.</p>
    <form id="form-home" method="GET" action="/nowhere">
          <div class="form-group">
              <label for="courseName">Courses:</label>
              <select id="courseSelector" class="form-control" name="selection">
                @foreach($courses as $course)
                <option value="courses/{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
                @foreach($ocourses as $ocourse)
                <option value="online-courses/{{ $ocourse->id }}">{{ $ocourse->name }}</option>
                @endforeach
                @foreach($privateLessons as $privateLesson)
                <option value="private-lessons/{{ $privateLesson->id }}">{{ $privateLesson->name }}</option>
                @endforeach
              </select>
            </div>
          <button class="btn btn-primary btn-lg btn-block button_slide slide_right sliding_button">View Course</button>
      </form>
</div>
</div>