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
          <label><input type="checkbox" id="memberAll" name="memberAll" v-model="memberAll" checked>All types </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" id="memberStudents" name="memberStudents" v-model="memberStudents">Students </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" id="memberAlumni" name="memberAlumni" v-model="memberAlumni">Alumni</label>
        </div>
        <div class="checkbox">
          <label> <input type="checkbox" id="memberFaculties" name="memberFaculties" v-model="memberFaculties">Faculty</label>
        </div>
      </div>
    </div>
    <div class="box-shadow-content animated fadeIn">
      <a href="#campus" data-toggle="collapse" class="reset-a">Campus <i class="fa fa-caret-down pull-right"></i></a>
      <div id="campus" class="collapse">
        <div class="checkbox">
          <label><input type="checkbox" id="campusAll" name="" v-model="campusAll" checked>All Campus </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" id="campusAmritapuri" name="" v-model="campusAmritapuri">Amritapuri </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" id="campusEttimadai" name="" v-model="campusEttimadai">Ettimadai</label>
        </div>
        <div class="checkbox">
          <label> <input type="checkbox" id="campusBangalore" name="" v-model="campusBangalore">Bangalore</label>
        </div>
        <div class="checkbox">
          <label> <input type="checkbox" id="campusKochi" name="" v-model="campusKochi">Kochi</label>
        </div>
      </div>
    </div>

    <div class="box-shadow-content animated fadeIn">
      <a href="#course" data-toggle="collapse" class="reset-a">Course <i class="fa fa-caret-down pull-right"></i></a>
      <div id="course" class="collapse">
        <div class="checkbox">
          <label><input type="checkbox" id="courseAll" name="" v-model="courseAll" checked>All types </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" id="courseBca" name="" v-model="bca">BCA </label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" id="courseMca" name="" v-model="mca">MCA</label>
        </div>
        <div class="checkbox">
          <label> <input type="checkbox" id="courseMech" name="" v-model="mech">MECH</label>
        </div>
        <div class="checkbox">
          <label> <input type="checkbox" id="courseEee" name="" v-model="eee">EEE</label>
        </div>
      </div>
    </div>
    <div class="box-shadow-content animated fadeIn">
      <div class="row" style="display:flex;align-items:center;justify-content:center">
        <div class="col-sm-6" >
            <div>Joining Year:</div>
        </div>
        <div class="col-sm-6">
          <input type="text" id="jYear" name="jyear" v-model="jyear" placeholder="eg: 2015" class="form-control">
        </div>
      </div>
    </div>
    <div class="box-shadow-content animated fadeIn">
      <div class="row" style="display:flex;align-items:center;justify-content:center">
        <div class="col-sm-6" >
            <div>Graduation Year:</div>
        </div>
        <div class="col-sm-6">
          <input type="text" id="gYear" name="gyear" v-model="gyear" placeholder="eg: 2018" class="form-control">
        </div>
      </div>
    </div>
  </div>
@endsection

@section('center')
  <div id="app2">
    <div class="box-shadow-full-height animated fadeInDownBig">
     <div class="loader" v-if="loader"></div>
      <div v-else>
        <h4 class="title">People</h4>
        <div class="row">
          <div class="col-lg-12">
            <div class="input-group">
              <input type="text" class="black-search" v-model="search" placeholder="Search"  @keyup.enter="request">
        </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div>
        <h4 class="title">@{{ users.data.length }} <small class="title">Amritians</small></h4>
        <div class="pink_line">
        </div>
        {{-- <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i> --}}
        {{-- @if($users->count()) --}}
          {{-- @foreach($users as $user) --}}
          <div class="wrapper" v-if="users.data.length!=0">
            <div class="row profile-search equal" v-for="user in users.data" :key="user.id">

              <div class="col-md-2">
                <a :href="profileLink+user.id" class="reset-a">
                  <img :src="imageLink+user.id+'/'+user.profile_image" alt="" class="ratio img-circle" width="60px" height="60px">
                </a>
              </div>

              <div class="col-md-10">
                <div class="row equal">
                  <div class="col-md-12" style="padding-bottom:0px">
                    <h5 class="title no-margin-bottom">
                      <a :href="profileLink+user.id" class="reset-a">
                      @{{ user.name }}
                    </a>
                      <small><i>@{{ user.course.name }} - @{{ user.graduation_year}}</i></small></h5>
                  </div>
                </div>
                <div class="row ">
                  <div class="col-md-12">
                    <h6 class="no-margin-bottom">@{{ user.designation }} at @{{ user.organization }}, @{{ user.city }}</h6>
                  </div>
                </div>
              </div>

            </div>
        {{-- @endforeach --}}
            <div class="center-div">
              <pagination :data="users" v-on:pagination-change-page="request"></pagination>
              {{-- {{ $users->links() }} --}}
            </div>
          </div>

        {{-- @else --}}
          <i v-else>Your search gave no results</i>
        {{-- @endif --}}
      </div>
    </div>
  </div>

@endsection
@section('scripts')
<script type="text/javascript">
  window.onload = new Vue({
      el: '#app',
      data: {
        search: '{!! $name !!}',
        memberAll: true,
        memberStudents: false,
        memberAlumni: false,
        memberFaculties: false,
        campusAll: true,
        campusAmritapuri: false,
        campusEttimadai: false,
        campusBangalore: false,
        campusKochi: false,
        courseAll: true,
        bca: false,
        mca: false,
        mech: false,
        eee: false,
        jyear: null,
        gyear: null,
        users: {},
        imageLink: '{!! asset('storage').'/' !!}',
        profileLink: '{!! URL::to('/').'/profile/' !!}',
        loader: false,
      },
      created: function() {
        this.request();
      },
      mounted: function() {
        console.log(this.users.data);
      },
      methods: {
        request: function (page) {
          if (typeof page === 'undefined') {
    				page = 1;
    			}
          var ap = this;
          this.loader = true;
          $.ajax({
                    type: 'GET',
                    url: window.location.origin + '/ajax/search-user?page=' + page,
                    data: {
                      memberAll: ap.memberAll,
                      memberStudents: ap.memberStudents,
                      memberAlumni: ap.memberAlumni,
                      memberFaculties: ap.memberFaculties,
                      campusAll: ap.campusAll,
                      campusAmritapuri: ap.campusAmritapuri,
                      campusEttimadai: ap.campusEttimadai,
                      campusBangalore: ap.campusBangalore,
                      campusKochi: ap.campusKochi,
                      courseAll: ap.courseAll,
                      bca: ap.bca,
                      mca: ap.mca,
                      mech: ap.mech,
                      eee: ap.eee,
                      jyear: ap.jyear,
                      gyear: ap.gyear,
                      search: ap.search,
                    },
                    error: function (err) {
                        console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
                    }
                }).done(function(data) {
                  //convert data in the response to array of objects
                  var array = $.map(data.data, function(value, index) {
                      return [value];
                  });
                  data.data = array;
                  ap.users = data;
                  console.log(ap.users.data);
          });
          this.loader = false;
        },
        getResults: function (page) {
    			if (typeof page === 'undefined') {
    				page = 1;
    			}

    			// Using vue-resource as an example
    			this.$http.get(window.location.origin + '/ajax/search-user' + page)
    				.then(response => {
    					return response.json();
    				}).then(data => {
    					this.laravelData = data;
    				});
    		}
      }
    });

</script>
@endsection
