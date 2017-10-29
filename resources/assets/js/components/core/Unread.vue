<template lang="html">
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
      <span class="fa fa-bell-o"></span>
      <a href="#">
        <span class="badge" style="background-color:red" v-if="all_nots_count!=0">{{ all_nots_count }}</span>
      </a>
    </a>
    <ul class="dropdown-menu dropdown-nav" role="menu">
      <li class="navhdrop">Notifications</li>
      <li class="navbdrop" v-if="all_nots_count==0"><img :src="imageUrl" class="navimg">&nbsp;&nbsp;All caught up with latest updates!</li>
      <li class="navbdrop" v-else>There are {{ all_nots_count }} <span class="text-info">New</span> notifications</li>
      <li class="navfdrop"><a :href="route">See all</a></li>
    </ul>
  </li>
</template>

<script>
export default {
  props: {
    imageUrl: String,
    route: String
  },
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
