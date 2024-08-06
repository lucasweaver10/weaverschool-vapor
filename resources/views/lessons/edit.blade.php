@extends('layouts.layout')

@section('title')
       Edit a Lesson
@endsection

@section('content')
<div class="container-fluid bg-white">
  
    <div class="row justify-content-center mt-3">
    
        <div class="col-lg-8">
            <form action="/lessons/{{ $lesson->id }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PATCH')

                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" value="{{ $lesson->name }}"> 
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-lg btn-primary">
                </div>

            </form>


    </div>
  </div>
</div>
@endsection

