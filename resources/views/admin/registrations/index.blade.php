<x-layouts.app>
{{--@section('title')--}}
{{--        Registrations | Admin--}}
{{--@endsection--}}
{{--@section('meta')--}}
{{--Registrations--}}
{{--@endsection--}}
{{--@section('content')--}}
<div class="container bg-white">
  <div class="row justify-content-center pt-3">
    <div class="col-lg-12">
      <h1>Registrations</h1>
        <div class="card">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Course</th>
                  <th scope="col">Balance</th>
                  <th scope="col">Group</th>
                  <th scope="col">Add to Group</th>
                  <th scope="col">+/-</th>
                </tr>
              </thead>
              <tbody class="card-body">
                @foreach ($registrations as $registration)
                <tr>
                    <th scope="row"><a href="/admin/registrations/{{ $registration->id }}">{{ $registration->id }}</a></th>
                  <td>{{ $registration->user_name }}</td>
                  <td>{{ $registration->course_name }}</td>
                <td>@if($registration->outstanding_balance == '0.00') Paid
                    @else €{{ $registration->outstanding_balance }}
                    @endif
                </td>
                  <td>{{ $registration->group->name ?? '' }}</td>
                  <td>
                    <form action="{{ url('/registrations/addToGroup') }}" method="POST">
                      @csrf
                  <div class="form-group">
                      <select class="form-control" id="group_id" name="group_id">
                          @foreach ($groups as $group)
                              <option value="{{ $group->id }}">{{ $group->name }}</option>
                          @endforeach
                      </select>
                    <input type="hidden" id="registration_id" name="registration_id" value="{{ $registration->id }}">
                    <input type="hidden" id="user_id" name="user_id" value="{{ $registration->user_id }}">
                    </td>
                    <td><button class="btn btn-primary" type="submit">Add to Group</button></td>
                  </form>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
</x-layouts.app>
