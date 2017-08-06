<template>
  <transition
  enter-active-class="animated fadeInDown"
  appear>
    <div class="panel panel-primary">
        <div class="panel-heading"><b>Join network</b></div>
        <form class="form-horizontal" action="http://localhost/" method="post">
          <div class="panel-body">
              <div class="panel-box">
                Campus
                <select class="form-control" name="" required="required">
                  <option value="amritapuri">Amritapuri</option>
                  <option value="ettimadai">Ettimadai</option>
                  <option value="banglore">Banglore</option>
                  <option value="kochi">Kochi</option>
                </select>
                <br>
              </div>
              <div class="panel-box">
                Course
                <select class="form-control" name="" required="required">
                  <option value="bca">BCA</option>
                  <option value="mech">MCA</option>
                  <option value="mech">MECH</option>
                  <option value="eee">EEE</option>
                  <option value="ece">ECE</option>
                  <option value="cse">CSE</option>
                  <option value="eng">Int MA Eng</option>
                  <option value="phy">Int. Phy</option>
                  <option value="chem">Int. Chem</option>
                  <option value="mtech">MTECH</option>
                  <option value="bcom">Bcom</option>
                  <option value="bba">BBA</option>
                  <option value="mba">MBA</option>
                </select>
                <br>
              </div>
              <div class="panel-box">
                Branch
                <select class="form-control" name="" required="required">
                  <option value="csa">CSA</option>
                  <option value="cse">CSE</option>
                  <option value="mech">Mechanical</option>
                  <option value="eee">EEE</option>
                  <option value="ece">ECE</option>
                  <option value="com">Commerce</option>
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
                    Graduation Year
                    <select class="form-control" name="" v-model="leavingDate" :disabled="disable" required="required">
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
    }
  },
  data() {
    return {
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
