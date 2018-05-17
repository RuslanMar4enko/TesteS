require('./bootstrap');


window.Vue = require('vue');

window.VueRouter = require('vue-router').default;

window.VueAxios = require('vue-axios').default;

window.Axios = require('axios').default;



Vue.component('top-header', require('./components/Header.vue'));

// register modules
Vue.use(VueRouter, VueAxios, axios);

const App = Vue.component('App', require('./components/pages/App.vue'));
// const eventIndex = Vue.component('eventIndex', require('./components/admin/pages/events/index.vue'));
// const eventStore = Vue.component('eventStore', require('./components/admin/pages/events/store.vue'));

const routes =  [
    {
        name: 'App',
        path: '/',
        component: App
    },
    // { name: 'eventIndex', path: '/events', component: eventIndex},
    // { name: 'eventStore', path: '/events/create', component: eventStore}
];

const router = new VueRouter({ routes });

const app = new Vue({
    el: '#app',
    router,
});