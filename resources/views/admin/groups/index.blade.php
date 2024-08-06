@extends('layouts.admin.layout')
@section('title')
        All Groups | The Weaver School
@endsection
@section('meta')
All groups
@endsection
@section('content')
<div class="container bg-white">
  <div class="row justify-content-center pt-3">
    <div class="col-lg-12">
      <h1>Groups</h1>
        <div class="card">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Teacher</th>
                  <th scope="col">Meeting Day</th>
                  <th scope="col">Meeting Time</th>
                  <th scope="col">Active</th>
                </tr>
              </thead>
              <tbody class="card-body">
                @foreach ($groups as $group)
                <tr>
                  <th scope="row">{{ $group->id }}</th>
                  <td>{{ $group->name }}</td>
                  <td>{{ $group->teacher->name ?? '' }}</td>
                  <td>{{ $group->meeting_day }}</td>
                  <td>{{ $group->meeting_time }}</td>
                  <td>@if($group->active == 1 ) Yes
                      @else No
                      @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
@endsection
