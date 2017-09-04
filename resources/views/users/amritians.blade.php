@extends('layouts.loginapp')

@section('title', 'Amritians')
@section('left')
  <div class="row search-filter">
    <h5 class="title animated fadeInLeft" style="margin-left:11px">Search Filter</h5>
    <div class="pink_line" style="margin-left:11px">
    </div>
    <div class="box-shadow-content animated fadeIn">
      <a href="#membertype" data-toggle="collapse" class="reset-a">Member type <i class="fa fa-caret-down pull-right"></i></a>
      <div id="membertype" class="collapse">
        <div class="checkbox">
          <label><input type="checkbox" name="" value="" checked>All types </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="" value="">Students </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="" value="">Alumni</label>
        </div>
        <div class="checkbox">
          <label> <input type="checkbox" name="" value="">Faculty</label>
        </div>
      </div>
    </div>
    <div class="box-shadow-content animated fadeIn">
      <a href="#campus" data-toggle="collapse" class="reset-a">Campus <i class="fa fa-caret-down pull-right"></i></a>
      <div id="campus" class="collapse">
        <div class="checkbox">
          <label><input type="checkbox" name="" value="" checked>All Campus </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="" value="">Amritapuri </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="" value="">Ettimadai</label>
        </div>
        <div class="checkbox">
          <label> <input type="checkbox" name="" value="">Bangalore</label>
        </div>
        <div class="checkbox">
          <label> <input type="checkbox" name="" value="">Kochi</label>
        </div>
      </div>
    </div>

    <div class="box-shadow-content animated fadeIn">
      <a href="#course" data-toggle="collapse" class="reset-a">Course <i class="fa fa-caret-down pull-right"></i></a>
      <div id="course" class="collapse">
        <div class="checkbox">
          <label><input type="checkbox" name="" value="" checked>All types </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="" value="">BCA </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="" value="">MCA</label>
        </div>
        <div class="checkbox">
          <label> <input type="checkbox" name="" value="">MECH</label>
        </div>

        <div class="checkbox">
          <label> <input type="checkbox" name="" value="">EEE</label>
        </div>
      </div>
    </div>
    <div class="box-shadow-content animated fadeIn">
      <div class="row" style="display:flex;align-items:center;justify-content:center">
        <div class="col-sm-6" >
            <div>Joining Year:</div>
        </div>
        <div class="col-sm-6">
          <input type="text" name="jyear" placeholder="eg: 2015" class="form-control">
        </div>
      </div>
    </div>
    <div class="box-shadow-content animated fadeIn">
      <div class="row" style="display:flex;align-items:center;justify-content:center">
        <div class="col-sm-6" >
            <div>Graduation Year:</div>
        </div>
        <div class="col-sm-6">
          <input type="text" name="gyear" placeholder="eg: 2018" class="form-control">
        </div>
      </div>
    </div>
  </div>
@endsection

@section('center')
  <div class="box-shadow-full-height animated fadeInDownBig">
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
                  <h5 class="title no-margin-bottom">
                    <a href="{{ route('profile', $user->id) }}" class="reset-a">
                    {{ $user->name }}
                  </a>
                    <small><i>{{ $user->course->name }} - {{ $user->graduation_year}}</i></small></h5>
                </div>
              </div>
              <div class="row ">
                <div class="col-md-12">
                  <h6 class="no-margin-bottom">{{ $user->designation }} at {{ $user->organization }}, {{ $user->city }}</h6>
                </div>
              </div>
            </div>

          </div>
      @endforeach
      <div class="center-div">

        {{ $users->links() }}
      </div>
    @else
      <i>Your search gave no results</i>
    @endif
  </div>
@endsection
@section('scripts')
  <script type="text/javascript">
//   $(window).scroll(function (event) {
//   var scroll = $(window).scrollTop();
//   console.log(scroll);
//   if(scroll>210) {
//     $('#navv').removeClass('navbar-fixed-top').addClass('animated').addClass('fadeOutUp');
//   }
//   else {
//     $('#navv').addClass('navbar-fixed-top').addClass('animated').addClass('fadeInDown');
//   }
// });
  </script>
@endsection
