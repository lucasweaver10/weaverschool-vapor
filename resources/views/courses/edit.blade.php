<x-layouts.app>
{{-- <x-app.meta-description content=""/> --}}

<div class="container-fluid bg-white">

    <div class="row justify-content-center mt-3">

        <div class="col-lg-8">
            <form action="/courses/{{ $course->id }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PATCH')

                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" value="{{ $course->name }}">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" value="{{ $course->description }}">
                  </div>
                  <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId" value="{{ $course->price }}">
                  </div>
                  <div class="form-group">
                    <label for="">Day</label>
                    <input type="text" class="form-control" name="day" id="day" aria-describedby="helpId" value="{{ $course->day }}">
                  </div>
                  <div class="form-group">
                    <label for="">Size</label>
                    <input type="text" class="form-control" name="size" id="size" aria-describedby="helpId" value="{{ $course->size }}">
                  </div>
                  <div class="form-group">
                    <label for="">Time</label>
                    <input type="text" class="form-control" name="time" id="time" aria-describedby="helpId" value="{{ $course->time }}">
                  </div>
                  <div class="form-group">
                    <label for="">Length</label>
                    <input type="text" class="form-control" name="length" id="length" aria-describedby="helpId" value="{{ $course->length }}">
                  </div>


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

</x-layouts.app>
