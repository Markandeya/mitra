<template lang="html">
  <a href="#">
    <span class="badge" style="background-color:red" v-if="all_nots_count!=0">{{ all_nots_count }}</span>
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
  },
  computed: {
    all_nots_count() {
      return this.$store.getters.all_nots_count
    }
  }
}
</script>

<style lang="css">
</style>
