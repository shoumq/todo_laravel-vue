import Vue from 'vue'
import './plugins/axios'
import Axios from 'axios'
import VueAxios from 'vue-axios'
import App from './App.vue'
import router from './router'

Vue.config.productionTip = false
Vue.use(Axios, VueAxios)

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
