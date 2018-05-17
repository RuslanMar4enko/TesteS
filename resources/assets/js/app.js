require('./bootstrap');


window.Vue = require('vue');

window.VueRouter = require('vue-router').default;

window.VueAxios = require('vue-axios').default;

window.Axios = require('axios').default;


Vue.component('top-header', require('./components/Header.vue'));

// register modules
Vue.use(VueRouter, VueAxios, axios);

const App = Vue.component('App', require('./components/pages/App.vue'));
 const colleagueStore = Vue.component('ColleagueStore', require('./components/pages/ColleagueStore.vue'));
 const colleagueShow = Vue.component('colleagueShow', require('./components/pages/ColleagueShow.vue'));

const routes =  [
    {
        name: 'App',
        path: '/',
        component: App
    },
     { name: 'colleagueStore', path: '/colleague/create', component: colleagueStore},
     { name: 'colleagueShow', path: '/colleague/:id', component: colleagueShow}
];

const router = new VueRouter({ routes });

const app = new Vue({
    el: '#app',
    router,
});