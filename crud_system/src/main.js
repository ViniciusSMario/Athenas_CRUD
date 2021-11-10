import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
Vue.component('pagination', require('laravel-vue-pagination'));
import Vuex from 'vuex'
import './plugins/axios'


Vue.config.productionTip = false

new Vue({
    Vuex,
    router,
    store,
    render: h => h(App)
}).$mount('#app')