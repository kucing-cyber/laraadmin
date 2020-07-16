
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import moment from 'moment';
import { Form, HasError, AlertError } from 'vform';



import swal from 'sweetalert2'
window.swal = swal;

//sweatalert
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', swal.stopTimer)
      toast.addEventListener('mouseleave', swal.resumeTimer)
    }
  });

window.toast = toast;

moment.locale('id');

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


Vue.component('pagination', require('laravel-vue-pagination'));

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'

import vSelect from 'vue-select'
Vue.component('v-select', vSelect)

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '4px'
  })

let routes = [
    { path: '/home', component: require('./components/dashboard.vue').default },
    { path: '/dashboard', component: require('./components/dashboard.vue').default },
    { path: '/profile', component: require('./components/profile.vue').default },
    { path: '/developer', component: require('./components/developer.vue').default },
    { path: '/siswa', component: require('./components/siswa.vue').default },
    { path: '/reguler', component: require('./components/reguler.vue').default },
    { path: '/GTK', component: require('./components/gtk.vue').default },
    { path: '/uangan', component: require('./components/keuangan.vue').default },
    { path: '/ekskul', component: require('./components/ekskul.vue').default },
    { path: '/setting', component: require('./components/setting.vue').default },
    { path: '/mutasi', component: require('./components/mutasi.vue').default },
    { path: '/alumni', component: require('./components/alumni.vue').default },
    { path: '/ujian', component: require('./components/ujian.vue').default },
  ]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

Vue.filter('UpText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});

Vue.filter('Upper', function(text){
    return text.toUpperCase();
});

Vue.filter('dt', function(buat){
    return moment(buat).format("MMMM Do YYYY");
});

window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data:{
        search: ''
    },
    methods:{
        searchit: _.debounce(() => {
            Fire.$emit('searching');
        },500),
    }
});
