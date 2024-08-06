@extends('layouts.shop-layout')

@section('title')
        Add a Course
@endsection

@section('content')

<div class="container">
   
    <h2>Create a Course</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach 
        </ul>
    </div>
    @endif

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    @endif
    
    <form method="POST" action="{{url('products')}}">
        {{csrf_field()}} 
        
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="description">
                </div>
        </div>

            <div class="row">
                    <div class="col-md-4"></div>
                    <div class="form-group col-md-4">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                </div>
  
       

        <div class="row"> 
            <div class="col-md-4"></div>
                 <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-success" style="">Add Course</button>  
                </div>       
        </div>    
    </form>
</div>
@endsection