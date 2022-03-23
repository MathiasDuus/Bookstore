import {createApp} from 'vue'

require('./bootstrap')
require('../css/app.css')
import App from './layouts/App.vue'
import axios from 'axios'
import router from './router'
const app = createApp(App)

// localStorage.clear()
// app.config.globalProperties.cart = [{}];
app.config.globalProperties.$axios = axios;
app.use(router)
app.mount('#app')



