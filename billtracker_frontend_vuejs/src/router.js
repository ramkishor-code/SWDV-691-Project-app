import Vue from 'vue'
import Router from 'vue-router'
import Login from './components/Login.vue'
import Register from './components/Register.vue'
import dashhome from './components/dashboard/dashhome.vue'
import home from './components/dashboard/home.vue'



Vue.use(Router)
 


export default new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes:[
        {path:'/',component:Login},
        {path:'/login',component:Login},
        {path:'/register',component:Register},
        {path:'/dashhome',
         component:dashhome,
         children: [
            {
              path: '/home',
              component:home
            },
            {
              path: '/managebills',
              component: () => import(/* webpackChunkName: "Messages" */ './components/dashboard/Managebills.vue')
            },
            {
              path: '/billingevents',
              component: () => import(/* webpackChunkName: "Profile" */ './components/dashboard/billingevents.vue')
            },
            {
              path: '/settings',
              component: () => import(/* webpackChunkName: "Settings" */ './components/dashboard/Settings.vue')
            }
          ]
        }
    ]
})