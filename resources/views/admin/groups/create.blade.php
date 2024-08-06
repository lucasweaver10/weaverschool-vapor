{{--@extends('layouts.admin.layout')--}}

{{--@section('title')--}}
{{--       Create a New Group--}}
{{--@endsection--}}

{{--@section('content')--}}
<x-layouts.app>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-4">
      <h1>Create a Group</h1>
        <form action="/groups" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Group Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="course">Course</label>
            <select name="course_id" id="course" class="form-control">
              @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="teacher">Teacher</label>
            <select name="teacher_id" id="teacher" class="form-control">
              @foreach ($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="experience">Experience</label>
            <select name="experience" id="experience" class="form-control">
              <option value="in-person">In-Person</option>
              <option value="online">Online</option>
            </select>
          </div>
          <div class="form-group">
            <label for="meeting_day">Meeting Day</label>
            <input type="text" class="form-control" id="meeting_day" name="meeting_day">
          </div>
          <div class="form-group">
            <label for="meeting_time">Meeting Time</label>
            <input type="text" class="form-control" id="meeting_time" name="meeting_time">
          </div>
          <div class="form-group">
            <label for="active">Active</label>
            <select name="active" id="active" class="form-control">
              <option value="0">No</option>
              <option value="1">Yes</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-lg btn-primary">
          </div>
        </form>
    </div>
  </div>
</div>
</x-layouts.app>
{{--@endsection--}}
