import App from './App.vue'
import { BootstrapVue} from 'bootstrap-vue'
import Vue from 'vue'
import router from "./router";


// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)

new Vue({
  router,
  el: '#app',
  render: h => h(App)
})
