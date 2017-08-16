<div class="row">
    <div class="col-md-6 col-md-offset-3">
    <join-network
    route="{{ route('authrequest') }}"
    csrf="{{ csrf_token() }}"
    errorjoin="{{ $errors->first('joinyear') }}"
    errorleft="{{ $errors->first('leftyear') }}"
    campusid = "{{ Auth::user()->campus_id }}"
    courseid = "{{ Auth::user()->course_id }}"
    branchid = "{{ Auth::user()->branch_id }}"
    joiningyear ="{{ Auth::user()->joining_year }}"
    graduationyear ="{{ Auth::user()->graduation_year }}" 
    ></join-network>
  </div>
</div>
