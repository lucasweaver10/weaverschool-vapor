{{--@extends('layouts.admin.layout')--}}
{{--@section('title')--}}
{{--        Students | The Weaver School--}}
{{--@endsection--}}
{{--@section('meta')--}}
{{--All Students--}}
{{--@endsection--}}
<x-layouts.app>

@section('content')
<div class="container bg-white">
  <div class="row justify-content-center pt-3">
    <div class="col-lg-12">
      <h1>Students</h1>
        <div class="card my-3">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Level</th>
                  <th scope="col">Score</th>
                  <th scope="col">Groups</th>
                </tr>
              </thead>
              <tbody class="card-body">
                @foreach ($users as $user)
                <tr>
                  <th scope="row">{{ $user->id }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->level ?? ""}}</td>
                  <td>{{ $user->level_test_score ?? ""}}</td>
                  <td>@foreach ($user->groups as $group)
                    {{ $group->name }}@if( count($user->groups) > '1'),
                          @endif
                      @endforeach
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
</x-layouts.app>
{{--@endsection--}}

