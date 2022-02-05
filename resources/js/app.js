/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import('./dash');

import router from './routes';
//import auth from './auth';

window.Vue = require('vue').default;

//Vue.mixin(auth)
const app = new Vue({
    el: '#component',
    router
});
 

