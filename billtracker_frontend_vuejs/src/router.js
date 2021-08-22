import Vue from 'vue'
import Router from 'vue-router'
import Login from './components/Login.vue'
import Register from './components/Register.vue'
import dashhome from './components/dashboard/dashhome.vue'
import home from './components/dashboard/home.vue'



Vue.use(Router)
 



const router= new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes:[
        
       {
         name:'homepage',
         path:'/',
         component: () => import(/* webpackChunkName: "Messages" */ './components/homepage.vue'),
         beforeEnter: guest
        },
      {
          name:'Login',
          path:'/login',
          component:Login,
          beforeEnter: guest
        },
      
        {
          path:'/register',
          component:Register,
          beforeEnter: guest
        },
        {
          name:'dashhome',
          path:'/dashhome',
          component: dashhome,
         beforeEnter: guard,
         children: [
            {
              path: '/home',
              component:home,
              beforeEnter: guard,
            
           
            },
            {
              path: '/managebills',
              component: () => import(/* webpackChunkName: "Messages" */ './components/dashboard/Managebills.vue'),
              beforeEnter: guard,
            },
            {
              path: '/billingevents',
              component: () => import(/* webpackChunkName: "Profile" */ './components/dashboard/billingevents.vue'),
              beforeEnter: guard,
            },
            {
              path: '/report',
              component: () => import(/* webpackChunkName: "Settings" */ './components/dashboard/report.vue'),
              beforeEnter: guard,
            }
          ]
        }
    ]
})



function guest(to, from, next) {
  if (localStorage.user) {
    next({ path: "/home" });
  } else next();
}

function guard(to, from, next) {
  if (localStorage.user) {
    next();
  } else next({ path: "/" });
}

export default router