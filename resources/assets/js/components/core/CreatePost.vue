<template>
  <transition
  enter-active-class="animated fadeInDown"
  appear>
    <div class="box-shadow-content">
      <h5><i class="fa fa-camera-retro"></i>&nbsp;Post</h5>
      <div class="box-input">
        <textarea class="box-textarea" name="name"  placeholder="Share an update"></textarea>
        <div class="row">
          <div class="pull-right">
            <div class="row">
              <div class="col-xs-6">
                  <select class="selectpicker form-control" id="test">
                    <option selected>Public</option>
                    <option>Friends</option>
                  </select>
              </div>
              <div class="col-xs-5">
                <button type="button" class="btn btn-primary btn-md" name="button">Post</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  data() {
    return {
      show: true,
      post: ''
    };
  },
  methods: {
  },
  mounted: function() {
    console.log('CreatePost loaded');
    $('#test').selectpicker();
  }
}
</script>
<style lang="css">
</style>
