<template>
  <div class="col-md-7 col-sm-6 col-xs-12">
    <transition
    enter-active-class="animated slideInUp"
    appear>
    <h1 style="font-size:30px;margin-top:20%;margin-bottom:50px">The Alumni platform By and For Amritians  <span class="blinking-cursor" style="color:inherit">|</span></h1>
</transition>
<transition
enter-active-class="animated slideInLeft"
appear>
      <p class="pull-left" style="font-family: 'Dancing Script', cursive; font-size:35px;color:#00b1b3"><span class="fa fa-quote-left"></span>&nbsp; Nobody is bothered about an institution more than its alumni &nbsp;<span class="fa fa-quote-right"></span></p>
</transition>
    <transition
    enter-active-class="animated slideInDown"
    appear>
      <p class="pull-left"> - Narayana Murthy, Co-founder of Infosys</p>
    </transition>
  </div>
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
