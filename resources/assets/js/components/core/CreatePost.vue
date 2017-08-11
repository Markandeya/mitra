<template>
  <div class="box-shadow-content">
    <h5><i class="fa fa-camera-retro"></i>&nbsp;Post</h5>
    <div class="box-input">
      <textarea class="box-textarea" name="name"  v-model="post" placeholder="Share an update"></textarea>
    </div>
  </div>
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
  }
}
</script>

<style lang="css">
</style>
