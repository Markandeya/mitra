<template>
  <transition
  enter-active-class="animated fadeIn"
  appear>
    <div class="box-shadow-content">
      <form :action="route" method="post">
        <div class="loader" v-if="loading">
        </div>
        <div class="box-input" v-else>
          <textarea class="box-textarea" name="name"  placeholder="Share an update" v-model="content"></textarea>
          <div class="row">
            <div class="pull-right">
              <div class="row">
                <div class="col-xs-6">
                    <select class="selectpicker form-control" id="test">
                      <option selected>Public   <i class="fa fa-globe"></i></option>
                      <option>Friends   <i class="fa fa-users"></i></option>
                    </select>
                </div>
                <div class="col-xs-6">
                  <button type="button" class="btn btn-info btn-md" name="button" @click="createPost">Post</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </transition>
</template>

<script>
export default {
  props: {
    route: String,
  },
  data() {
    return {
      show: true,
      post: '',
      loading: false,
      content: '',
    };
  },
  methods: {
    createPost() {
      this.loading = true;
      var ap = this;
      $.ajax({
                type: 'GET',
                url: window.location.origin + '/ajax/create-post',
                data: {
                  content: ap.content,
                },
                error: function (err) {
                    console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
                }
            }).done(function(data) {
              console.log(data)
              new noty({
                type: 'success',
                layout: 'bottomCenter',
                timeout: 2000,
                theme: 'metroui',
                text: '<p class="text-center">Created post!</p>',
                animation: {
                     open: 'animated fadeInUp',
                     close: 'animated fadeOut',
                 }
              }).show();
      });
      this.loading = false;
    }
  },
  mounted: function() {
    //console.log('CreatePost loaded');
    $('#test').selectpicker();
  }
}
</script>
<style lang="css">
</style>
