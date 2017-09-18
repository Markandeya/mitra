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
              <i class="fa fa-thumbs-o-up" :id="'l'+i" ></i>
              <a :href="'#l'+i" @click="like(i)">Like</a>
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
          <div class="comment-box">
            <div class="row">
              <div class="col-md-1">
                <img :src="profileImage" alt="" class="ratio img-circle" width="30px" height="30px">
              </div>
              <div class="col-md-11">
                <textarea class="comment-textarea" name="name"  placeholder="Write a comment" ></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>
</template>

<script>
export default {
  props: {
    baseLink: String,
    profileImage: String,
    userId: [String, Number],
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
    console.log(this.profileImage)
  },
  methods: {
    showComment(i) {
      console.log(i);
      $('#c'+i).addClass('animated flipInX').css('display', 'block')
      $('.feed').removeClass('animated fadeIn')
      $('#c'+i).removeClass('fadeIn')
    },
    like(i) {
        $('#l'+i).toggleClass('animated tada').toggleClass('liked')
    },
    request() {

      var ap = this
      this.loading = true
      if (this.userId == 'none') {
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
      } else {
        $.ajax({
                  type: 'GET',
                  url: window.location.origin + '/ajax/get-posts/' + ap.userId,
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
      }

      this.loading = false
    },
  }
}
</script>

<style lang="css">
</style>
