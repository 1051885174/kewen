import Vue from 'vue'
import App from './App.vue'
import router from './router'
//引入elementUI组件
import ElementUI from 'element-ui'
import { Message } from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import axios from 'axios'
axios.interceptors.request.use(config => {
  config.headers.Authorization = window.sessionStorage.getItem('token');
  console.log(config);
  return config;
})
Vue.prototype.$ajax = axios
Vue.prototype.$msg=Message
Vue.config.productionTip = false
Vue.use(ElementUI)
new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
router.beforeEach((to, from, next) => {
  if (to.path === '/login') {
    next()
  }
  const token = window.sessionStorage.getItem('token');
  if (!token || token == '' || token == null || token == undefined) {
    next('/login')
  }
  next()
})
