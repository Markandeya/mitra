<template lang="html">
  <transition
  enter-active-class="animated fadeIn"
  appear>
  <div class="row">
    <div class="loader pull-right" v-if="loading"></div>
    <div class="col-md-12" v-else>
      <a href="#" class="btn btn-sm btn-primary pull-right" style="margin: 10px 0;font-weight:700"  v-if="status==0" @click="addFriend">Add friend &nbsp;<i class="fa fa-user-plus"></i></a>
      <span class="label label-info pull-right" style="font-weight:700;font-size:12px;padding:5px 10px;line-height:1.5;display:block" v-if="status=='friends'">Friends &nbsp;<i class="fa fa-check-circle"></i></span>
      <a href="#" class="btn btn-sm btn-success pull-right" style="margin: 10px 0;font-weight:700"  v-if="status=='pending'" @click="acceptFriend">Accept friend &nbsp;<i class="fa fa-check"></i></a>
      <span class="label label-primary pull-right" style="font-weight:700;font-size:12px;padding:5px 10px;line-height:1.5;display:block" v-if="status=='waiting'">Waiting for response &nbsp;<i class="fa fa-hourglass-o"></i></span>
    </div>
  </div>
  </transition>
</template>

<script>
export default {
  props: ['profile_user_id'],
  data() {
    return {
      status : '',
      loading: true,
    };
  },
  mounted() {
    this.$http.get('/ajax/check-relationship-status/' + this.profile_user_id).then( (response) => {
      this.status = response.body.status;
      this.loading = false;
    });
  },
  methods: {
    addFriend() {
      this.loading = true;
      this.$http.get('/ajax/add-friend/' + this.profile_user_id).then( (response) => {
        if(response.body == "1")
          this.status = 'waiting';
          new noty({
            type: 'success',
            layout: 'bottomCenter',
            timeout: 2000,
            theme: 'metroui',
            text: '<p class="text-center">Friend request sent.</p>',
            animation: {
                 open: 'animated fadeInUp',
                 close: 'animated fadeOut',
             }
          }).show();
      });
      this.loading = false;
    },
    acceptFriend() {
      this.loading = true;
      this.$http.get('/ajax/accept-friend/' + this.profile_user_id).then( (response) => {
        if(response.body == "1")
          this.status = 'friends';
          new noty({
            type: 'success',
            layout: 'bottomCenter',
            timeout: 2000,
            theme: 'metroui',
            text: '<p class="text-center">You are now friends!</p>',
            animation: {
                 open: 'animated fadeInUp',
                 close: 'animated fadeOut',
             }
          }).show();
      });
      this.loading = false;
    }
  }
}
</script>

<style lang="css">
</style>
