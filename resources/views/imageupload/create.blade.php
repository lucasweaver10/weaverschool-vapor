@extends('layouts.layout')

@section('title')
       Upload an Image
@endsection

@section('content')
<div class="container-fluid bg-white">
  
    <div class="row justify-content-center mt-3">
    
        <div class="col-lg-8">
            <form action="/image-uploads" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-lg btn-primary">
                </div>

            </form>


    </div>
  </div>
</div>
@endsection

