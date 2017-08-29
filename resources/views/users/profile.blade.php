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
      <div class="modal-body">
        <div class="form-group">
          <label for="name">Name:</label>
          <input id="name" type="text" name="name" value="{{$user->name}}" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Current Designation:</label>
          <input id="desig" type="text" name="name" value="Student" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Current Organization:</label>
          <input id="org" type="text" name="name" value="Amrita Vishwa Vidyapeetham, Amritapuri" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Current City:</label>
          <input id="autocomplete" placeholder="Your city" type="text" class="form-control"></input>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
@endsection
@section('left')
left
@endsection
@section('center')
<div class="box-shadow-profile" style="margin-top:10px;max-width:600px;">
  <div class="row">
    <div class="col-md-4">
        <img src="https://graph.facebook.com/1840513862943806/picture?width=450" style="max-width:150px" class="ratio img-responsive img-circle" alt="Cinque Terre">
    </div>
    <div class="col-md-8">
      <h4 class="title">{{$user->name}} <a href="#" class="pull-right" style="font-size:12px" data-toggle="modal" data-target="#profile"><i class="fa fa-edit"></i>Edit</a></h4>
      <h5 class="title-light">Student at Amrita Vishwa Vidyapeetham, Amritapuri</h5>
      <h5 class="title-lighter">Lives @ Trivandrum</h5>
      <h6>{{$user->email}}</h6>
      <div class="">
        <span class="label label-success">Student</span>
        <span class="label label-info">{{$user->course->name}} {{$user->graduation_year}}</span>
      </div>
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
<script type="text/javascript">
  function autoPlaces()
  {
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input);
  }
</script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw2dWoHBzUQRpzzgPDCbb-1l2VM-qxpIs&libraries=places&callback=autoPlaces"></script>
@endsection
