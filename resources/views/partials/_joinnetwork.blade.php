<join-network
route="{{ route('authrequest') }}"
csrf="{{ csrf_token() }}"
errorjoin="{{ $errors->first('joinyear') }}"
errorleft="{{ $errors->first('leftyear') }}"></join-network>
