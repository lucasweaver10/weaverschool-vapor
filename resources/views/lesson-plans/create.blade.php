@extends('layouts.layout')

@section('title')
       Add a New Lesson Plan
@endsection

@section('content')
<div class="container bg-white">
  @if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <p>{{ $message }}</p>
    </div>
  @endif
  @if ($errors->any())
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <ul>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}.</p>
        @endforeach
    </ul>
</div>
@endif
@if($message = Session::get('error'))
    <div class="alert alert-warning alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <p>{{ $message }}</p>
    </div>
  @endif
  
    <div class="row justify-content-center mt-3">
    
        <div class="col-lg-6">
          <h1>Add a Lesson Plan</h1>
            <form action="/lesson-plans" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder=""> 
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder=""> 
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Course:</label>
                  <select class="form-control" name="course_id" id="course_id">
                    @foreach ($courses as $course)                
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-lg btn-primary">
                </div>

            </form>
    </div>
  </div>
</div>
@endsection

