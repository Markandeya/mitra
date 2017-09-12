<template>
  <transition
  enter-active-class="animated fadeInUp"
  appear>
  <div class="panel panel-primary">
    <div class="panel-heading text-center" style=""><h3 style="font-family:'Source Sans Pro',sans-serif">Signup here!</h3></div>
    <div class="panel-body">
        <form class="form-horizontal" method="POST" :action="route">
          <input type="hidden" name="_token" :value="csrf">
          <div class="panel-box">
            Name
            <input id="name" type="text" name="name" value="" class="form-control" placeholder="John Doe" required>
            <div class="alert alert-danger alert-dismissible" role="alert" v-if="errorname!=''">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{ errorname }}</strong>
            </div>
          </div>
          <div class="panel-box">
            Email
            <input id="email" type="email" name="email" value="" class="form-control" placeholder="example@example.com" required>
            <div class="alert alert-danger alert-dismissible" role="alert" v-if="erroremail!=''&&erroremail!='These credentials do not match our records.'">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{ erroremail }}</strong>
            </div>
          </div>
          <div class="panel-box">
            Password
            <input id="password" type="password" name="password" value="" class="form-control" placeholder="Your password" required>
            <div class="alert alert-danger alert-dismissible" role="alert" v-if="errorpasswd!=''">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>{{ errorpasswd }}</strong>
            </div>
          </div>
          <div class="panel-box">
            Confirm Password
            <input id="password-confirm" type="password" name="password_confirmation" value="" class="form-control" placeholder="Re-type password" required>
          </div>
          <div class="panel-box">
            <br>
            <button type="submit" class="btn btn-block btn-success">Sign up</button>
          </div>
          <div class="text-center" style="margin-top:2px;margin-bottom:2px;font-size:20px;font-weight:bold">OR</div>
          <div class="panel-box">
            <a class="btn btn-block btn-social btn-facebook" href="http://localhost:8000/auth/facebook">
                <span class="fa fa-facebook"></span> Sign in with Facebook
            </a>
          </div>
          <div class="panel-box">
            <a class="btn btn-block btn-social btn-google" href="http://localhost:8000/auth/google">
                <span class="fa fa-google"></span> Sign in with Google
            </a>
          </div>
          <div class="panel-box">
            <br>
            By clicking Join now, you agree to the Amrita User Agreement, Privacy Policy, and Cookie Policy.
          </div>
        </form>
    </div>
  </div>
  </transition>
</template>

<script>
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
          errorname: {
            type: String,
            default: ''
          },
          erroremail: {
            type: String,
            default: ''
          },
          errorpasswd: {
            type: String,
            default: ''
          },
        },
        mounted() {
            console.log('Component mounted.');
            console.log()
        },
        data() {
          return {
          };
        }
    }
</script>
