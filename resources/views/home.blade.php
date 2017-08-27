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
                  <div class="col-md-3" style="padding-top:20px;">
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a style="background-color:#00b1b3;color:white" data-toggle="tab" href="#group">Your Groups</a></li>
                      <li><a style="background-color:aliceblue" data-toggle="tab" href="#forum">Disqus Forum</a></li>
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
                     <div id="forum" class="tab-pane fade box-shadow-content-solid">

                       <p><a href="#" class="btn-black">@Vasudev posted in <span class="label label-info">Web</span> topic <i style="color:#cacbce;font-weight:700">1min ago</i></p></a>
                       <p><a href="#" class="btn-black">@EvanYou posted in <span class="label label-info">Vuejs</span> topic <i style="color:#cacbce;font-weight:700">2h ago</i></p></a>
                       <p><a href="#" class="btn-black">@Otwell posted in <span class="label label-info">Laravel</span> topic <i style="color:#cacbce;font-weight:700">1d ago</i></a></p>
                       <a href="#" class="btn-more">+View More</a>
                     </div>
                   </div>
                   <div class="box-shadow-content-solid" style="margin-top:10px">
                     <div class="" style="display:flex;justify-content:center">
                       <h4 style="padding-bottom:5px;border-bottom:2px solid #e7eceb">What's trending now &nbsp;</h4>
                       <i class="fa fa-line-chart pull-right" style="font-size:29px;color:#f4645f;padding-top:10px"></i>
                     </div>
                     <h2 style="text-align:center;color: #e7ecee">Coming Soon!</h2>
                   </div>
                    <div class="box-shadow-content-solid" style="margin-top:10px;max-height:120px;display:flex;flex-direction:column;justify-content:center;align-items:center;background-image:url({{asset('images/memphis.png')}})">
                      <p style="font-size:20px"><b style="font-size:40px">0</b> connections <a href="#" style="font-size:16px">See all</a></p>
                      <a href="#" class="btn btn-primary">Find Connections</a>
                    </div>
                  </div>
                  <div class="col-md-7" style="padding-top:10px">
                    <div class="container-fluid">
                      <create-post></create-post>

                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="hidden-xs" data-spy="affix" data-offset-top="2px" style="width:100%">
                      <div class="box-shadow-sidebar">
                        <h4>Online members</h4>
                        <h4 style="color: #e7ecee">Coming Soon!</h4>

                      </div>
                    </div>
                  </div>
                </div>
              {{-- </div> --}}
            @endif
{{-- </div> --}}
@endsection
