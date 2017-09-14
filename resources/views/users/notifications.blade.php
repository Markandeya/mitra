@extends('layouts.loginapp')
@section('center')
  <div class="box-shadow-full-height">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title text-center">Your notifications <i class="fa fa-bell"></i></h3>
      </div>
      <ul class="list-group">
        @foreach ($nots as $not)
          <li class="list-group-item">
            {{ $not->data['message']}}
            <span class="pull-right">{{ $not->created_at->diffForHumans() }}</span>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

@endsection
