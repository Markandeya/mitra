<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
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
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><i class="fa fa-navicon"></i></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-main">
                <li class="active tab"><a href="#">Home</a></li>
                <li class="tab"><a href="#amritians">Amritians</a></li>
              </ul>
              <form class="navbar-form navbar-left hidden-xs" action="">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn search">
                          <button class="btn btn-default" type="button">Go!</button>
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
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          <span class="fa fa-bell-o"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-nav" role="menu">
                          <li class="navhdrop">Notifications</li>
                          <li class="navbdrop"><img src="{{ asset('images/navbar/clock.png')}}" class="navimg">&nbsp;&nbsp;All caught up with latest updates!</li>
                          <li class="navfdrop"><a href="#">See all</a></li>
                        </ul>
                      </li>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                              <img src=" https://graph.facebook.com/1840513862943806/picture?type=small" alt="" class="img-circle" height="30px"> <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                              <li><a href="#">My Profile <i class="fa fa-user"></i></a></li>
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
        @include('partials._messages')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
       $('.selectpicker').selectpicker();
      });
    </script>
    @yield('scripts')
</body>
</html>
