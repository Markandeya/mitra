@if (Session::has('success'))
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success:&nbsp;</strong>{{ Session::get('success') }}
      </div>
    </div>
  </div>
@endif

@if (Session::has('warning'))
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning:&nbsp;</strong>{{ Session::get('warning') }}
      </div>
    </div>
  </div>
@endif

@if (Session::has('info'))
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Note:&nbsp;</strong>{{ Session::get('info') }}
      </div>
    </div>
  </div>
@endif

@if (Session::has('danger'))
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Note:&nbsp;</strong>{{ Session::get('danger') }}
      </div>
    </div>
  </div>
@endif

@if (count($errors) > 0)
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Errors:&nbsp;</strong>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </div>
@endif
