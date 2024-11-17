import { createApp } from 'vue'
import { createPinia } from 'pinia'
import './style.css'
import App from './App.vue'
import router from '@/router/index'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUser, faInfoCircle, faBars, } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import axios from 'axios'

const pinia = createPinia()
const app = createApp(App)

library.add (faUser, faInfoCircle, faBars)
app.use(router)
app.use(pinia)
app.mount('#app')
app.component('font-awesome-icon', FontAwesomeIcon)


axios.defaults.baseURL = 'http://localhost/setup/server/public/api/' 