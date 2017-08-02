<template>
  <transition
  enter-active-class="animated fadeInDown"
  appear>
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Join network</b></div>

        <div class="panel-body">
          <!-- <form class="form-horizontal" method="POST"> -->
            <div class="panel-box">
              Campus
              <select class="form-control" name="">
                <option value="amritapuri">Amritapuri</option>
                <option value="ettimadai">Ettimadai</option>
                <option value="banglore">Banglore</option>
                <option value="kochi">Kochi</option>
              </select>
              <br>
            </div>
            <div class="panel-box">
              Course
              <select class="form-control" name="">
                <option value="bca">BCA</option>
                <option value="mech">Mechanical</option>
                <option value="eee">Electrical and Electronics</option>
              </select>
              <br>
            </div>
            <div class="panel-box">
              Branch
              <select class="form-control" name="">
                <option value="csa">CSA</option>
                <option value="cse">CSE</option>
                <option value="mech">Mechanical</option>
                <option value="mech">EEE</option>
                <option value="mech">ECE</option>

              </select>
              <br>
            </div>
            <div class="panel-box">
              <div class="row">
                <div class="col-md-6">
                  Joining Year
                  <select class="form-control" @change="updateLeaving" v-model="join" required="required">
                    <option value="Select an option" selected>Select an option</option>
                    <option v-for="year in dates" :value="year">{{ year }}</option>
                  </select>
                </div>
                <div class="col-md-6">
                  Leaving Year
                  <select class="form-control" name="" v-model="leavingDate" :disabled="disable">
                    <option v-for="year in ldates" :value="year">{{ year }}</option>
                  </select>
                </div>
              </div>
            </div>
            <hr>
            <div class="panel-box">
              The details provided will be verified by <b>Mitra ADMINISTRATOR</b>
            </div>
            <div class="panel-box">
              <br>
              <button type="submit" class="btn btn-block btn-primary">Submit</button>
            </div>
          <!-- </form> -->
        </div>
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
  mounted() {
      console.log('Component mounted.');
  },
  data() {
    return {
      test: 'tets',
      dates: dates(),
      ldates: '',
      disable: true,
      join: 'Select an option',
      leavingDate: ''
    };
  },
  methods: {
    updateLeaving() {
      console.log(this.join);
      if (typeof this.join === 'string' || this.join instanceof String) {
        console.log("Its a string");
        this.ldates = '';
        this.disable = true;
      }

      else {
        var options = [];
        var end = new Date().getFullYear() + 6;
        var i = 0;
        for(var year = this.join + 1 ; year <=end; year++)
        {
          options.push(year);
          console.log(options[i++]);
        }
        this.ldates = options;
        this.disable = false;
      }
    }

  }
}
</script>

<style lang="css">
</style>
