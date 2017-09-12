<template lang="html">
<div class="">

</div>
</template>

<script>
export default {
  mounted() {
    this.listen();
  },
  props: ['id'],
  methods: {
    listen() {
      console.log('noti');

      Echo.private('App.User.' + this.id).notification( (notification) => {
        if(status == 408 || status == 503){
          console.log('wtf');
        }
        alert('New notification!');
        console.log(notification);
      });
    }
  }
}
</script>

<style lang="css">
</style>
