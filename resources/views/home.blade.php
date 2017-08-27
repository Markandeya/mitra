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
              {{-- <div class="container"> --}}
                <div class="row" style="margin-top:50px">
                  <div class="col-md-10" style="padding-top:10px">
                    <div class="container-fluid">
                      <create-post></create-post>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <br>
                      <br><br><br><br><br><br>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <br><br><br><br>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="hidden-xs" data-spy="affix" data-offset-top="2px">
                      <div class="box-shadow-sidebar"><h3>Online members</h3></div>
                    </div>
                  </div>
                </div>
              {{-- </div> --}}
            @endif
{{-- </div> --}}
@endsection
