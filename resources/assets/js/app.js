
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./bootstrap-select');
window.Vue = require('vue');
Vue.use(require('vue-resource'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('signup', require('./components/welcome/Signup.vue'));
Vue.component('welcome-quote', require('./components/welcome/WelcomeQuote.vue'));
Vue.component('join-network', require('./components/welcome/JoinNetwork.vue'));
Vue.component('create-post', require('./components/core/CreatePost.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('friend', require('./components/core/Friend.vue'));
Vue.component('friend-sm', require('./components/core/FriendSmall.vue'));
Vue.component('notification', require('./components/core/Notification.vue'));


window.onload = function () {
  const app = new Vue({
      el: '#app'
  });
}
