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

      Echo.private('Mitra.User.' + this.id).notification( (notification) => {
        alert('New notification!');
        console.log(notification);
      });
    }
  }
}
</script>

<style lang="css">
</style>
