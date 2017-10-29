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
        new noty({
          type: 'success',
          layout: 'bottomCenter',
          text: '<p class="text-center">'+ notification.message +'</p>',
          animation: {
               open: 'animated fadeInUp',
               close: 'animated fadeOut',
           }
        }).show()
        this.$store.commit('add_not', notification)
        console.log(document.getElementById('noty_audio'))
        $("#noty_audio")[0].play()
      });
    }
  }
}
</script>

<style lang="css">
</style>
