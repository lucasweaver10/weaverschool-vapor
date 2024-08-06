@extends('layouts.layout')

@section('title')
       Add a New Lesson
@endsection

@section('content')
<div class="container bg-white">
  
    <div class="row justify-content-center mt-3">
    
        <div class="col-lg-6">
          <h1>Add a Lesson</h1>
            <form action="/lessons" method="POST" enctype="multipart/form-data">
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
                  <label for="">Number</label>
                  <input type="text" class="form-control" name="number" id="number" aria-describedby="helpId" placeholder=""> 
                </div>
                <div class="form-group">
                  <label for="">image</label>
                  <input type="text" class="form-control" name="image" id="image" aria-describedby="helpId" placeholder=""> 
                </div>
                <div class="form-group">
                  <label for="">Video</label>
                  <input type="text" class="form-control" name="video" id="video" aria-describedby="helpId" placeholder=""> 
                </div>
                <div class="form-group">
                  <label for="">Homework</label>
                  <input type="text" class="form-control" aria-describedby="helpId" name="homework" id="homework" placeholder=""> 
                </div>
                <div class="form-group">
                  <label for="">Resources</label>
                  <input type="text" class="form-control" name="resources" id="resources" aria-describedby="helpId" placeholder=""> 
                </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Lesson Plan:</label>
                  <select class="form-control" name="lesson_plan_id" id="lesson_plan_id">
                    @foreach ($lesson_plans as $lesson_plan)                
                    <option value="{{ $lesson_plan->id }}">{{ $lesson_plan->name }}</option>
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

