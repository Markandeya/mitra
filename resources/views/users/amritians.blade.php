@extends('layouts.loginapp')

@section('title', 'Amritians')

@section('left')
  Left
@endsection

@section('center')
  <div class="box-shadow-full-height">
    <h4 class="title">People</h4>
    <div class="row">
      <div class="col-lg-12">
        <div class="input-group">
          <input type="text" class="black-search">
        </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
    </div>
    <h4 class="title">{{ $users->count() }} <small class="title">Amritians</small></h4>
    <div class="pink_line">
    </div>
    {{-- <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i> --}}
    @if($users->count())
      @foreach($users as $user)
          <div class="row profile-search equal">

            <div class="col-md-2">
              <a href="{{ route('profile', $user->id) }}" class="reset-a">
              <img src="{{asset('storage').'/'.$user->id.'/'.$user->profile_image}}" alt="" class="ratio img-circle" width="60px" height="60px">
            </a>
            </div>

            <div class="col-md-10">
              <div class="row equal">
                <div class="col-md-12" style="padding-bottom:0px">
                  <h5 class="title">
                    <a href="{{ route('profile', $user->id) }}" class="reset-a">
                    {{ $user->name }}
                  </a>
                    <small><i>{{ $user->course->name }} - {{ $user->graduation_year}}</i></small></h5>
                </div>
              </div>
              <div class="row ">
                <div class="col-md-12">
                  <h6>{{ $user->designation }} at {{ $user->organization }}, {{ $user->city }}</h6>
                </div>
              </div>
            </div>

          </div>

      @endforeach
    @else
      <i>Your search gave no results</i>
    @endif
  </div>
@endsection
