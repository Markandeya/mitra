@section('stylesheet')
<style media="screen">
  .panel-box {
    font-weight: bold;
  }

  .blinking-cursor {
    font-weight: 100;
    font-size: 30px;
    color: #f4645f;;
    -webkit-animation: 1s blink step-end infinite;
    -moz-animation: 1s blink step-end infinite;
    -ms-animation: 1s blink step-end infinite;
    -o-animation: 1s blink step-end infinite;
    animation: 1s blink step-end infinite;
  }

  @keyframes "blink" {
    from, to {
      color: transparent;
    }
    50% {
      color: #f4645f;;
    }
  }

  @-moz-keyframes blink {
    from, to {
      color: transparent;
    }
    50% {
      color: #f4645f;;
    }
  }

  @-webkit-keyframes "blink" {
    from, to {
      color: transparent;
    }
    50% {
      color: #f4645f;;
    }
  }

  @-ms-keyframes "blink" {
    from, to {
      color: transparent;
    }
    50% {
      color: #f4645f;;
    }
  }

  @-o-keyframes "blink" {
    from, to {
      color: transparent;
    }
    50% {
      color: #f4645f;;
    }
  }
</style>
@endsection
@extends('layouts.main')
@section('content')
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron welcome-jumbo" style="">
    <div class="container">
      <div class="row">
          <welcome-quote></welcome-quote>
          {{-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> --}}
        <div class="col-md-5 col-sm-6 col-xs-12">
            <signup
                route="{{ route('register') }}"
                csrf="{{ csrf_token() }}"
                errorName="{{ $errors->first('name') }}"
                errorEmail="{{ $errors->first('email') }}"
                errorPasswd="{{ $errors->first('password') }}">
            </signup>
        </div>
      </div>

    </div>
  </div>
@endsection
