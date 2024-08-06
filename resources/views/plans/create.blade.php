@extends('layouts.layout')

@section('title')
       Create a New Plan
@endsection

@section('content')
<div class="container-fluid bg-white">
    <div class="row justify-content-center mt-3">
        <h1>Add a Plan</h1>
    </div>
    <div class="row justify-content-center mt-3">


        <div class="col-lg-5">
            <form action="/plans" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="">Plan Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Experience</label>
                    <select class="form-control" name="experience" id="experience">
                        <option>Online</option>
                        <option>In-Person</option>
                      </select>
                </div>

                <div class="form-group">
                    <label for="">Type</label>
                    <select class="form-control" name="type" id="type">
                        <option>Single</option>
                        <option>Recurring</option>
                      </select>
                </div>

                <div class="form-group">
                    <label for="">Total Lessons</label>
                    <input type="text" class="form-control" name="total_lessons" id="total_lessons" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Weekly Lessons</label>
                    <input type="text" class="form-control" name="weekly_lessons" id="weekly_lessons" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Total Price</label>
                    <input type="text" class="form-control" name="total_price" id="total_price" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Monthly Price</label>
                    <input type="text" class="form-control" name="monthly_price" id="monthly_price" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Interval</label>
                    <input type="text" class="form-control" name="interval" id="interval" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Times to Charge</label>
                    <input type="text" class="form-control" name="times" id="times" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Courses</label>
                    <select multiple class="form-control" name="course_id[]" id="course_id">
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

