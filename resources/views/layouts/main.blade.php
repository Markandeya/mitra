<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="../../favicon.ico">

    <title>{{ config('app.name') }}</title>

    <!-- Mitra Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Miriam+Libre|Source+Sans+Pro" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('js/app.js')}}">
    </script>
    @yield('stylesheet')
  </head>

  <body>
  <div id="app">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Mitra</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active tab"><a href="#">Home</a></li>
            <li class="tab"><a href="#about">About</a></li>
            <li class="tab"><a href="#contact">Contact</a></li>
            </li>
          </ul>
          <form class="navbar-form navbar-right" method="POST" action="{{route('login')}}">
            {{ csrf_field() }}
            <div class="form-group">
              <input type="text" placeholder="Email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    @include('partials._messages')
    @yield('content')

    <div class="container footer">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h3>Other links</h3>
          <p><a href="#">Embracing the world</a></p>
          <p><a href="#">Amma.org</a></p>
          <p><a href="#">Amritapuri</a></p>
          <p><a href="#">AMrita SeRVe</a></p>
          <p><a href="#">Amrita Vidyalayam</a></p>
          <p><a href="#">IAM-Meditation Technique</a></p>
          <p><a href="#">Amrita Civil Service Academy</a></p>
          <p><a href="#">Amrita Multimedia Academy</a></p>
        </div>
        <div class="col-md-4">
          <h3>@ Social Media</h3>
          <p><span class="fa fa-youtube-play"></span> <a href="#">Youtube Channel</a></p>
          <p><span class="fa fa-facebook-official"></span> <a href="#">Facebook Page</a></p>
          <p><span class="fa fa-twitter"></span> <a href="#">Twitter</a></p>
          <p><span class="fa fa-google-plus-square"></span> <a href="#">Google+</a></p>
          <p><span class="fa fa-linkedin-square"></span> <a href="#">Linkedin</a></p>
          <p><span class="fa fa-google"></span> <a href="#">Google Scholar</a></p>
          <p><span class="fa fa-android"></span> <a href="#">Amrita University Android App</a></p>
          <p><span class="fa fa-wikipedia-w"></span> <a href="#">Wikipedia</a></p>
       </div>
        <div class="col-md-4">
          <h3>Contact Us</h3>
          <p>Amrita University, </p>
          <p>Amrita Vishwa Vidyapeetham</p>
          <p>Amritanagar, Coimbatore - 641 112</p>
          <p>Tamilnadu, India</p>
          <p><span class="fa fa-phone"></span> +91 422 2685000</p>
          <p><span class="fa fa-phone"></span> Fax: +91-422-2686274</p>
          <p><span class="fa fa-envelope-o"></span> <a href="https://amrita.edu/contact-us">Contact details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>Mitra <b>by</b> Amrita &copy; 2017 <span class="pull-right">Made with <i class="fa fa-heart" style="color:lightpink"></i> by <a href="http://github.com/Markandeya">@Markandeya </a><i class="fa fa-github-alt"></i></span></p>
      </footer>
    </div> <!-- /container -->
  </div>
  @yield('scripts')
  </body>
</html>
