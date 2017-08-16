<template>
  <transition
  enter-active-class="animated fadeInDown"
  appear>
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Join network</b></div>
        <form class="form-horizontal" :action="route" method="post">
          <input type="hidden" name="_token" :value="csrf">
          <div class="panel-body">
              <div class="panel-box">
                Campus
                <select class="form-control" name="campus" required="required">
                  <option value="1" :selected="campusid==1">Amritapuri</option>
                  <option value="2" :selected="campusid==2">Ettimadai</option>
                  <option value="3" :selected="campusid==3">Banglore</option>
                  <option value="4" :selected="campusid==4">Kochi</option>
                </select>
                <br>
              </div>
              <div class="panel-box">
                Course
                <select class="form-control" name="course" required="required">
                  <option value="1" :selected="courseid==1">BCA</option>
                  <option value="2" :selected="courseid==2">MCA</option>
                  <option value="3" :selected="courseid==3">MECH</option>
                  <option value="4" :selected="courseid==4">EEE</option>
                </select>
                <br>
              </div>
              <div class="panel-box">
                Branch
                <select class="form-control" name="branch" required="required">
                  <option value="1" :selected="branchid==1">CSA</option>
                  <option value="2" :selected="branchid==2">Mechanical</option>
                  <option value="3" :selected="branchid==3">EEE</option>
                </select>
                <br>
              </div>
              <div class="panel-box">
                <div class="row">
                  <div class="col-md-6">
                    Joining Year
                    <select class="form-control" name="joinyear" @change="updateLeaving" v-model="join" required="required">
                      <option v-for="year in dates" :value="year">{{ year }}</option>
                    </select>
                    <div class="alert alert-danger alert-dismissible" role="alert" v-if="errorjoin!=''">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>{{ errorjoin }}</strong>
                    </div>
                  </div>
                  <div class="col-md-6">
                    Graduation Year
                    <select class="form-control" name="leftyear" v-model="graduationyear" :disabled="disable" required="required">
                      <option v-for="year in ldates" :value="year">{{ year }}</option>
                    </select>
                    <div class="alert alert-danger alert-dismissible" role="alert" v-if="errorleft!=''">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>{{ errorleft }}</strong>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="alert alert-warning">
                The details provided will be verified by <b>Mitra ADMINISTRATOR</b> and can't be changed.
              </div>
              <div class="panel-box">
                <br>
                <button type="submit" class="btn btn-block btn-primary">Submit</button>
              </div>
          </div>
        </form>
    </div>
  </transition>
</template>

<script>
function dates() {
  var start =1994;
  var end = new Date().getFullYear() + 6;
  var options = [];
  var i = 0;
  for(var year = start ; year <=end; year++)
  {
    options.push(year);
    console.log(options[i++]);
  }
  return options;
}

export default {
  props: {
    route: {
      type: String,
      required: true
    },
    csrf: {
      type: String,
      required: true
    },
    errorjoin: {
      type: String,
      default: ''
    },
    errorleft: {
      type: String,
      default: ''
    },
    campusid: {
      type: String,
      default: 1
    },
    courseid: {
      type: String,
      default: 1
    },
    branchid: {
      type: String,
      default: 1
    },
    joiningyear: {
      type: String,
      default: 0
    },
    graduationyear: {
      type: String,
      default: ''
    },
  },
  mounted: function () {
    this.join = JSON.parse(this.joiningyear);
    console.log('join is: ' + this.join);

    if(this.join!=0)
    {

      this.disable = false;
      console.log('disable'+this.disable);
      this.updateLeaving();
    }
  },
  data() {
    return {
      dates: dates(),
      ldates: '',
      disable: true,
      leavingDate: '',
      join: 0
    };
  },
  methods: {
    updateLeaving() {
      console.log(this.join);
      // if (typeof this.join === 'string' || this.join instanceof String) {
      //   console.log("Its a string" + this.join);
      //   this.ldates = '';
      //   this.disable = true;
      // }
      if (this.join == 0) {
        console.log("Zero" + this.join);
        this.ldates = '';
        this.disable = true;
      }
      else {
        console.log('options');
        var options = [];
        var end = new Date().getFullYear() + 6;
        console.log(this.join+";"+end);
        var i = 0;
        console.log(parseInt(this.join) + 1);
        for(var year = parseInt(this.join) + 1 ; year <=end; year++)
        {
          options.push(year);
          //console.log(options[i++]);
        }
        this.ldates = options;
        console.log('array: '+options);
        this.disable = false;
      }
    }

  }
}
</script>

<style lang="css">
</style>
