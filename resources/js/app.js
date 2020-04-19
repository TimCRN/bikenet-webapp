require('./bootstrap');
import Vue from 'vue';
import Routes from './routes.js';
import App from './views/App';

window.Vue = require('vue');

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import VueToasted from 'vue-toasted';
Vue.use(VueToasted, {
    duration: 3000,
    position: 'top-right',
    action: {
        text: 'ok',
        onClick: (e, toastObject) => {
            toastObject.goAway(0)
        }
    }
})

import * as VueGoogleMaps from 'vue2-google-maps';
Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyDziXQSn8g9ZGIO3plOnwCeuORZ1nFcsqU',
    },
    installComponents: true
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: Routes,
    render: h => h(App),
});
export default app;




