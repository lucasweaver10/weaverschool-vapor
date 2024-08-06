@extends('layouts.layout')

@section('title')
       Add a New feature
@endsection

@section('content')
<div class="container-fluid bg-white">
  
    <div class="row justify-content-center mt-3">
    
        <div class="col-lg-6">
          <h1>Add a feature</h1>
            <form action="/features" method="POST" enctype="multipart/form-data">
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
                  <label for="">About</label>
                  <input type="text" class="form-control" name="about" id="about" aria-describedby="helpId" placeholder=""> 
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-lg btn-primary">
                </div>

            </form>
    </div>
  </div>
</div>
@endsection

