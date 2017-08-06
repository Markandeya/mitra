@extends('layouts.app')

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
        <div class="col-md-6 col-md-offset-3">
          Welcome admin!
        </div>
    </div>
</div>
@endsection
