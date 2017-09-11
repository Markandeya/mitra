<template lang="html">
  <transition
  enter-active-class="animated fadeIn"
  appear>
    <a href="#" style="margin: 0" @click="sendRequest"><i class="fa fa-user-plus fa-user-plus-add"></i></a>
  </transition>
</template>

<script>
export default {
  methods: {
    sendRequest() {
      console.log("send friend request");
    }
  }
}
</script>

<style lang="css">
</style>
