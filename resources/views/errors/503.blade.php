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
    <style media="screen">
    #app{
      height: 100vh;
      width: 100vw;
      justify-content: center;
      align-items: center;
    }
      h2 {
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
  <div id="app">
    <h2 style="font-family: 'Dancing Script', cursive; font-size:35px;color:#00b1b3"><span class="fa fa-quote-left"></span>The service is currently unavailable. <span class="fa fa-quote-right"></span></h2>
  </div>
  </body>
</html>
