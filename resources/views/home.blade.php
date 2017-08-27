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
                  <div class="col-md-3" style="padding-top:8px;">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a data-toggle="tab" href="#group">Your Groups</a></li>
                      <li><a data-toggle="tab" href="#menu1">Disqus Forum</a></li>
                    </ul>
                    <div class="tab-content">
                     <div id="group" class="tab-pane fade in active box-shadow-content-solid">
                       <div style="display:flex;justify-content:;max-height:100%;max-width:100%;width:100%;flex-direction: column;align-items: center;">
                         <img src="{{asset('images/group.png')}}" alt="No groups yet" style="max-width:100%;max-height:100%;width:150px;height: 150px;">
                         <a href="#" class="btn-more">+Join a Group</a>
                       </div>
                       {{-- <h3>Latest Activities</h3>
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed labore et dolore magna aliqua.</p>
                       <a href="#" class="btn-more">+View More</a> --}}
                     </div>
                     <div id="menu1" class="tab-pane fade box-shadow-content-solid">

                       <p><a href="#" class="btn-black">@Vasudev posted in <span class="label label-primary">Web</span> topic <i style="color:#cacbce;font-weight:700">1min ago</i></p></a>
                       <p><a href="#" class="btn-black">@EvanYou posted in <span class="label label-primary">Vuejs</span> topic <i style="color:#cacbce;font-weight:700">2h ago</i></p></a>
                       <p><a href="#" class="btn-black">@Otwell posted in <span class="label label-primary">Laravel</span> topic <i style="color:#cacbce;font-weight:700">1d ago</i></a></p>
                       <a href="#" class="btn-more">+View More</a>
                     </div>
                   </div>
                  </div>
                  <div class="col-md-7" style="padding-top:10px">
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
                      <div class="box-shadow-sidebar">
                        <h3>Online members</h3>
                      </div>
                    </div>
                  </div>
                </div>
              {{-- </div> --}}
            @endif
{{-- </div> --}}
@endsection
