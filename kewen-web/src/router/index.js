import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../views/Login.vue'
import register from '../views/register.vue'
import Home from '../views/Home'
import Activity from '../views/Activity'
import Document from '../views/doucment'
import person from '../views/person'
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Login',
    component: Login
  },
  {
    path: '/home',
    name: 'Home',
    component: Home
  },
  {
    path: '/register',
    name: 'register',
    component:register
  }, {
    path: '/activity',
    name: 'Activity',
    component:Activity
  }, {
    path: '/doucment',
    name: 'Doucment',
    component:Document
  }, {
    path: '/person',
    name: 'person',
    component:person
}]

const router = new VueRouter({
  routes
})

/*router.beforeEach((to, from, next) => {
  if (to.path === '/login') {
    next()
  }
  const token = window.sessionStorage.getItem('token');
  if (!token || token == '' || token == null || token == undefined) {
    next('/login')
  }
  next()
})*/
export default router
