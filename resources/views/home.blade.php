@extends('layouts.loginapp')

@section('styles')
  <style media="screen">
    body {
      --background-image: url("{{asset('images/photography.png')}}");
      --background-attachment: fixed;
      height:100%;
    }
  </style>
@endsection

@section('content')
{{-- <div class="container"> --}}

            @if(Auth::user()->activated == 0)
              @include('partials._joinnetwork')
            @else
              <div class="container">
                <div class="row" style="margin-top:50px">
                  <div class="col-md-10" style="padding-top:10px">
                    <create-post></create-post>
                  </div>
                  <div class="col-md-2">
                    <div class="" data-spy="affix" data-offset-top="2px">
                      <h2>I stick here</h2>
                    </div>
                  </div>
                </div>
              </div>
            @endif
{{-- </div> --}}
@endsection
