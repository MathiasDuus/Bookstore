import {createApp} from 'vue'
// window.Vue = require('vue');

require('./bootstrap')
require('../css/app.css')
import App from './layouts/App.vue'
import axios from 'axios'
import router from './router'
import Auth from './Auth.js';
const app = createApp(App)

// app.config.globalProperties.$auth = Auth;
// console.log(app.config.globalProperties.$auth)
// Vue.prototype.auth = Auth;
// localStorage.clear()
// app.config.globalProperties.cart = [{}];
app.config.globalProperties.$axios = axios;
app.config.globalProperties.$auth = Auth;
app.use(router)
app.mount('#app')



