<template lang="html">
  <div class="feed animated fadeIn">
      <div class="loader" v-if="loading">
      </div>
      <div class="box-shadow-feed" v-for="post in posts" v-else>
        <div class="row row-eq-height">
          <div class="col-sm-1">
            <a :href="baseLink+'/profile/'+post.user.id" class="reset-a">
              <img :src="post.user.profile_image" alt="" class="ratio img-circle" width="30px" height="30px">
            </a>
          </div>
          <div class="col-sm-11">
            <a :href="baseLink+'/profile/'+post.user.id"><h5 class="title">{{ post.user.name }} <small class="pull-right">{{ post.created_at }}</small></h5></a>
          </div>
        </div>
        <div class="container">
          {{ post.content }}
        </div>
      </div>
  </div>
</template>

<script>
export default {
  props: {
    baseLink: String
  },
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
                url: window.location.origin + '/ajax/feed',
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
