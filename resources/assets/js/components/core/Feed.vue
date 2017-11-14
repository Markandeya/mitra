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
              <span class="mitra-pink"><i class="fa fa-plus"></i>{{ post.likes.length }}</span>
              <i class="fa fa-thumbs-o-up" :id="'l'+i" ></i>
              <a :href="'#l'+i" :id="post.id" @click="like">Like</a>
            </div>
            <div class="feed-control">
              <i class="fa fa-comment-o"></i>
              <a :href="'#c'+i" @click="showComment(i)">Comment</a>
            </div>
            <!-- <div class="feed-control">
              <i class="fa fa-share"></i>
              <a href="#">Share</a>
            </div> -->
          </div>
        </div>
        <div class="comment-show" v-show="boolComment" :id="'c'+i">
          <div class="loader" v-if="commentLoader"></div>
          <div class="comment-box" v-else>
            <div class="row">
              <div class="col-md-1">
                <img :src="profileImage" alt="" class="ratio img-circle" width="30px" height="30px">
              </div>
              <div class="col-md-11">
                <textarea class="comment-textarea" :id="post.id" v-model="comment"  placeholder="Write a comment" @keyup.enter="writeComment"></textarea>
              </div>
            </div>
          </div>
          <div class="row" v-for="comment in post.comments">
            <div class="col-md-1">
              <img :src="comment.user.profile_image" alt="" class="ratio img-circle" width="30px" height="30px">
            </div>
            <div class="col-md-11">
              <h5>{{comment.comment}} <small> <span class="pull-right"> {{comment.created_at}} </span></small></h5>
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
        boolComment: false,
        commentLoader: false,
        comment: '',
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
    like(event) {
        var postId = event.target.id;
        console.log(postId)
        //$('#l'+i).toggleClass('animated tada').toggleClass('liked')
        var ap = this;

        $.ajax({
                  type: 'GET',
                  url: window.location.origin + '/ajax/like',
                  data: {
                    postId: postId,
                  },
                  error: function (err) {
                      console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
                  }
              }).done(function(data) {
                console.log(data)
                if(data == 0)
                {
                  new noty({
                    type: 'success',
                    layout: 'bottomCenter',
                    timeout: 2000,
                    text: '<p class="text-center">Unliked.</p>',
                    animation: {
                         open: 'animated fadeInUp',
                         close: 'animated fadeOut',
                     }
                  }).show()
                } else {
                  new noty({
                    type: 'success',
                    layout: 'bottomCenter',
                    timeout: 2000,
                    theme: 'metroui',
                    text: '<p class="text-center">Liked.</p>',
                    animation: {
                         open: 'animated fadeInUp',
                         close: 'animated fadeOut',
                     }
                  }).show()
                }
        });
        this.request()
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
    writeComment(event) {
      //console.log('works');
      var ap = this;
      this.commentLoader = true;
      var postId = event.target.id;
      $.ajax({
                type: 'GET',
                url: window.location.origin + '/ajax/create-comment',
                data: {
                  postId: postId,
                  comment: ap.comment,
                },
                error: function (err) {
                    console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
                }
            }).done(function(data) {

              console.log(data);
      });
      this.commentLoader = false;
      this.request();
    }
  }
}
</script>

<style lang="css">
</style>
