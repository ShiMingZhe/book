
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import VueScoller from 'vue-scroller';

Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(VueScoller);
import store from './store/';//vuex 数据存储所需对象
import routes from './routes';//路由配置文件
//实例化路由
const router = new VueRouter({
    mode:'history',
    routes:routes
});
var vm = new Vue({
    store,
    router
}).$mount('#app');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
