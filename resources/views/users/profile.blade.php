@extends('layouts.loginapp')

@section('title', $user->name)

@section('modal')
<!-- Modal -->
<div id="profile" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <form action="{{route('update-profile')}}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
          <div class="modal-body">
            <div class="form-group">
              <label for="imagePath" >Profile image: <span v-text="fileName"></span></label>

                @if($errors->has('image'))
                   <div class="form-group">
                     <span style="color:red">{{ $errors->first('image') }}</span class="alert alert-danger">
                   </div>
                @endif
              <div class="form-group">
                <button type="button" class="btn btn-primary btn-sm" name="button" @click="openFile">Select image</button>
                <input type="file" name="image" id="fileUpload" accept=".png,.jpg,.jpeg,.gif,.tif" class="hidden" ref="fileInput" @change="upload"/>
              </div>
              <label for="name">Name:</label>
              <input id="name" type="text" name="name" value="{{$user->name}}" class="form-control">
              @if($errors->has('name'))
                <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only">Error:</span>
                  {{$errors->first('name')}}
                </div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Current Designation:</label>
              <input id="desig" type="text" name="designation" value="{{$user->designation}}" class="form-control">
              @if($errors->has('designation'))
                <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only">Error:</span>
                  {{$errors->first('designation')}}
                </div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Current Organization:</label>
              <input id="org" type="text" name="organization" value="{{$user->organization}}" class="form-control">
              @if($errors->has('organization'))
                <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only">Error:</span>
                  {{$errors->first('organization')}}
                </div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Current City:</label>
              <input id="autocomplete" name="city" placeholder="Your city" type="text" value="{{$user->city}}" class="form-control"></input>
              @if($errors->has('city'))
                <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only">Error:</span>
                  {{$errors->first('city')}}
                </div>
              @endif
            </div>
          </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </form>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="image" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$user->name}}</h4>
      </div>
      <div class="modal-body" style="display:flex;justify-content:center">
        <img src="{{asset('storage').'/'.$user->id.'/'.$user->profile_image}}" style="max-width:100%" class="ratio img-responsive img-circle" alt="Profile image">

      </div>
    </div>

  </div>
</div>
@endsection
@section('left')

@endsection
@section('center')
<div class="box-shadow-profile">
  <div class="row">
    <div class="col-md-4">
        <a data-toggle="modal" data-target="#image"><img src="{{asset('storage').'/'.$user->id.'/'.$user->profile_image}}" style="max-width:150px" class="ratio img-responsive img-circle" alt="Profile image"></a>
    </div>
    <div class="col-md-8">
      <h4 class="title">{{$user->name}}
        @if($user->id == Auth::user()->id)
          <a href="#" class="pull-right" style="font-size:12px" data-toggle="modal" data-target="#profile">
            <i class="fa fa-edit"></i>Edit
          </a>
        @endif
      </h4>
      <h5 class="title-light">{{$user->designation}} at {{$user->organization}}</h5>
      <h5 class="title-lighter">Lives @ {{$user->city}}</h5>
      <h6>{{$user->email}}</h6>
      <div class="">
        <span class="label label-success">Student</span>
        <span class="label label-info">{{$user->course->name}} {{$user->graduation_year}}</span>
        <span class="label label-default">{{$user->campus->name}}</span>
      </div>
        @if($user->id != Auth::user()->id)
          <friend :profile_user_id="{{ $user->id }}"></friend>
        @endif
    </div>
  </div>
</div>
@endsection
@section('scripts')
<style>
  .pac-container {
      z-index: 10000 !important;
  }
</style>
@if($errors->any())
<script> $('#profile').modal('show');</script>
@endif
<script type="text/javascript">
  function autoPlaces()
  {
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input);
  }

</script>
<script type="text/javascript">
  var app = new Vue({
    el: '#profile',
    data : {
      fileName: ''
    },
    methods: {
      openFile: function(e) {
        $('#fileUpload').click();
      },
      upload: function (event) {
        const files = event.target.files;
        this.fileName = files[0].name;
        console.log('Somethings ip');
      }

    }
  });
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw2dWoHBzUQRpzzgPDCbb-1l2VM-qxpIs&libraries=places&callback=autoPlaces"></script>

@endsection
