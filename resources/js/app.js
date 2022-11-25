/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

window.Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.Vue.component('date-picker', VuePersianDatetimePicker);

var app = new window.Vue({
    el: '#app',
    data: {
        date: '1397/02/02'
    },
    components: {
        DatePicker: VuePersianDatetimePicker
    }
});

var app2 = new window.Vue({
    el: '#app2',
    date: {
        default: '01:00'
    },
    components: {
        DatePicker: VuePersianDatetimePicker
    }
});
