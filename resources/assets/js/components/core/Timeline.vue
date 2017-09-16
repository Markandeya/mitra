<template lang="html">
  <div class="feed animated fadeIn">
      <div class="loader" v-if="loading">
      </div>
      <div class="box-shadow-feed" v-for="post in posts" v-else>
        {{ post.content }}
      </div>
  </div>
</template>

<script>
export default {
  props: ['user_id'],
  data () {
    return {
        posts: {},
        loading: true,
    }

  },
  created () {
    this.request()
  },
  methods: {
    request() {

      var ap = this
      this.loading = true
      $.ajax({
                type: 'GET',
                url: window.location.origin + '/ajax/get-posts/' + ap.user_id,
                error: function (err) {
                    console.log("AJAX error in request: " + JSON.stringify(err, null, 2))
                    ap.posts = "Whoops! Couldn't get data for u."
                    ap.loading = false
                }
            }).done(function(data) {
              //convert data in the response to array of objects
              ap.posts = data
              console.log(data)
      })
      this.loading = false
    },
  }
}
</script>

<style lang="css">
</style>
