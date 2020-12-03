/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// event-bus.js
import Vue from 'vue';

const EventBus = new Vue();

export default EventBus;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//export const Bus = new Vue();
axios.defaults.baseURL = 'http://127.0.0.1:8000/api/';

Vue.component('materias', require('./components/Materias/MateriasComponent.vue').default);
Vue.component('add-materias', require('./components/Materias/AddMateriasComponent.vue').default);
Vue.component('show-materias', require('./components/Materias/ShowMateriasComponent.vue').default);
Vue.component('post', require('./components/PostComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */ 

const app = new Vue({
    el: '#app',
});
