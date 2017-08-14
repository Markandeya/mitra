@extends('layouts.admin')

@section('styles')
  <style media="screen">
    body {
      background-image: url("{{asset('images/cloudy-day.png')}}");
    }
  </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Account activation requests</div>

            <!-- Table -->
            <table class="table">
              <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>email</th>
                  <th>Branch</th>
                  <th>Course</th>
                  <th>Campus</th>
                  <th>Duration</th>
                  <th>Action</th>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->branch->name}}</td>
                    <td>{{ $user->course->name}}</td>
                    <td>{{ $user->campus->name}}</td>
                    <td>{{ $user->joining_year }} - {{ $user->graduation_year }}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-success">Activate</button>
                      <button type="button" class="btn btn-sm btn-danger pull-right">Reject</button>
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
