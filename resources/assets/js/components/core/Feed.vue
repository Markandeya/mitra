<template lang="html">
  <div class="feed animated fadeIn">
      <div class="loader" v-if="loading">
      </div>
      <div class="wrap" v-for="(post, i) in posts" v-else>
        <div class="box-shadow-feed">
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
          <div class="row">
            <div class="feed-control">
              <i class="fa fa-thumbs-o-up"></i>
              <a href="#">Like</a>
            </div>
            <div class="feed-control">
              <i class="fa fa-comment-o"></i>
              <a :href="'#c'+i" @click="showComment(i)">Comment</a>
            </div>
            <div class="feed-control">
              <i class="fa fa-share"></i>
              <a href="#">Share</a>
            </div>
          </div>
        </div>
        <div class="comment-show" v-show="comment" :id="'c'+i">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
        comment: false,
    }

  },
  created () {
    this.request()
  },
  methods: {
    showComment(i) {
      console.log(i);
      $('#c'+i).addClass('animated flipInX').css('display', 'block')
      $('.feed').removeClass('animated fadeIn')
      $('#c'+i).removeClass('fadeIn')
    },
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
