@extends('layouts.app')

@section('styles')
  <style media="screen">
    body {
      background-image: url("{{asset('images/photography.png')}}");
    }
  </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if(Auth::user()->activated == 0)
              @include('partials._joinnetwork')
            @else
              Account activated!
            @endif
        </div>
    </div>
</div>
@endsection
