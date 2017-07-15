<template>
  <transition
  enter-active-class="animated fadeInUp"
  appear>
  <div class="panel panel-primary">
    <div class="panel-heading text-center" style=""><h3 style="font-family:'Source Sans Pro',sans-serif">Signup here!</h3></div>
    <div class="panel-body">
      <div class="panel-box">
        First name
        <input type="text" name="" value="" class="form-control" placeholder="John">
      </div>
      <div class="panel-box">
        Last name
        <input type="text" name="" value="" class="form-control" placeholder="Doe">
      </div>
      <div class="panel-box">
        Email
        <input type="email" name="" value="" class="form-control" placeholder="example@example.com">
      </div>
      <div class="panel-box">
        Password
        <input type="password" name="" value="" class="form-control" placeholder="Your password">
      </div>
      <div class="panel-box">
        <br>
        <a class="btn btn-block btn-social btn-facebook" href="http://localhost:8000/auth/facebook">
            <span class="fa fa-facebook"></span> Sign in with Facebook
        </a>
      </div>
      <div class="panel-box">
        <br>
        <a class="btn btn-block btn-social btn-google" href="http://localhost:8000/auth/google">
            <span class="fa fa-google"></span> Sign in with Google
        </a>
      </div>
      <div class="panel-box">
        <br>
        By clicking Join now, you agree to the Amrita User Agreement, Privacy Policy, and Cookie Policy.
        <br> <br>
      </div>
      <div class="panel-box">
        <button type="submit" name="" value="" class="btn btn-block btn-success">Sign up</button>
      </div>
    </div>
  </div>
  </transition>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
          return {
            msg: 'Hello'
          };
        }
    }
</script>
