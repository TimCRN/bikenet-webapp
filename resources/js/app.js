require('./bootstrap');
import Vue from 'vue';
import Routes from './routes.js';
import App from './views/App';

window.Vue = require('vue');

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

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




