require('./bootstrap');

import Vue from "vue";
Vue.component('weather',require('./components/WeatherApi.vue').default);
Vue.component('trending-movies',require('./components/TMDBApi.vue').default);
Vue.component('reddit-threads',require('./components/RedditApi.vue').default);
Vue.component('news',require('./components/NewsApi.vue').default);
new Vue({
    el:'#app'
});
