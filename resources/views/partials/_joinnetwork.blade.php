<div class="row">
    <div class="col-md-6 col-md-offset-3">
    <join-network
    route="{{ route('authrequest') }}"
    csrf="{{ csrf_token() }}"
    errorjoin="{{ $errors->first('joinyear') }}"
    errorleft="{{ $errors->first('leftyear') }}"></join-network>
  </div>
</div>
