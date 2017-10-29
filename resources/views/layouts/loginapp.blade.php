<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{{ asset('images/favicon.png') }}}">
    <style media="screen">
    [v-cloak] {
      display: none;
    }
    </style>
    @yield('css')
    @yield('styles')
</head>
<body>
  @yield('modal')
    <div id="app">
        @if(Auth::user()->activated == 0)
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-main">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right navbar-main">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
      @else
        <nav class="navbar navbar-default navbar-fixed-top" id="navv">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('images/navbar/m.png')}}" style="height:24px;display:inline" alt="M"><b class="logo">itra</b></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-main">
                <li class="{{ Request::is('home')?'active':'tab' }}"><a href="{{route('home')}}">Home</a></li>
                <li class="{{ Request::is('amritians')?'active':'tab' }}"><a href="{{route('amritians')}}">Amritians</a></li>
              </ul>
              <form class="navbar-form navbar-left hidden-xs" action="{{ route('amritians') }}" method="get">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Search for..." style="max-width:200px">
                  <span class="input-group-btn search">
                    <button class="btn btn-default" type="submit">Go!</button>
                  </span>
                </div>
              </form>
              <!-- Right Side Of Navbar -->
              <ul class="nav navbar-nav navbar-right navbar-main">
                  <!-- Authentication Links -->
                  @if (Auth::guest())
                      <li><a href="{{ route('login') }}">Login</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                  @else
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="fa fa-user-plus"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-nav" role="menu">
                        <li class="navhdrop">Follow requests</li>
                        <li class="navbdrop"><img src="{{ asset('images/navbar/user2.png')}}" class="navimg">&nbsp;&nbsp;No pending follow requests. </li>
                        <li class="navfdrop"><a href="#">Find friends</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="fa fa-envelope-o"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-nav" role="menu">
                        <li class="navhdrop">Messages</li>
                        <li class="navbdrop"><img src="{{ asset('images/navbar/message.svg')}}" class="navimg">&nbsp;&nbsp; You have not received any messages yet.</li>
                        <li class="navfdrop"><a href="#">Inbox</a><a href="#">+New</a></li>
                      </ul>
                    </li>
                    <unread :image-url="'{{ asset('images/navbar/clock.png')}}'"
                            :route="'{{ asset('notifications') }}'">
                    </unread>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                              <img src="{{ Auth::user()->profile_image}}" alt="" class="ratio img-circle" height="30px" width="30px"> <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                              <li><a href="{{route('profile', Auth::user()->id)}}">My Profile <i class="fa fa-user"></i></a></li>
                              <li><a href="#">Settings&nbsp;&nbsp;&nbsp; <i class="fa fa-cogs"></i></a></li>
                              <li>
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Logout &nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-sign-out"></i>
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @endif
              </ul>
            </div><!--/.navbar-collapse -->
          </div>
        </nav>
      @endif
        {{-- @include('partials._messages') --}}
        <div class="row" style="margin-top:50px">
          @yield('content')
          <notification :id="{{Auth::id()}}"></notification>
          <audio id="noty_audio" src="{{ asset('audio/tone.mp3') }}" type="audio/mp3">
          </audio>
          <div class="col-md-3" style="padding-top:20px;">
            @yield('left')
          </div>
          <div class="col-md-7" style="padding-top:10px">
            @yield('center')
          </div>
          <div class="col-md-2">
            @include('partials._sidebar')
          </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
      $(window).on('load', function() {
       var a =$('#test').selectpicker();

       @if (Session::has('success'))
         new noty({
           type: 'success',
           layout: 'bottomCenter',
           text: '<p class="text-center">{{ Session::get('success') }}</p>',
           animation: {
                open: 'animated fadeInUp', // Animate.css class names
                close: 'animated fadeOut' // Animate.css class names
            }
         }).show();
       @endif

       @if (Session::has('warning'))
         new noty({
           type: 'warning',
           layout: 'bottomCenter',
           text: '<p class="text-center">{{ Session::get('warning') }}</p>',
           animation: {
                open: 'animated shake', // Animate.css class names
                close: 'animated bounceOutLeft' // Animate.css class names
            }
         }).show();
       @endif

       @if (Session::has('info'))
         new noty({
           type: 'info',
           layout: 'bottomCenter',
           text: '<p class="text-center">{{ Session::get('info') }}</p>',
           animation: {
                open: 'animated flash', // Animate.css class names
                close: 'animated bounceOutLeft' // Animate.css class names
            }
         }).show();
       @endif
      });
      console.log('test1');
    if (window.location.hash && window.location.hash == '#_=_') {
        window.location.hash = '';
    }

    </script>
    @yield('scripts')
    @yield('js')
</body>
</html>
