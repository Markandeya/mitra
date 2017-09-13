<template lang="html">
  <a href="#">
    <span class="badge" style="background-color:red">4</span>
  </a>
</template>

<script>
export default {
  mounted() {
    console.log('mountain');
    this.get_unread()
  },
  methods: {
    get_unread() {
      this.$http.get('/ajax/get-unread').then((nots) => {
        nots.body.forEach( (not) => {
          this.$store.commit('add_not', not)
        })
      })
    }
  }
}
</script>

<style lang="css">
</style>
