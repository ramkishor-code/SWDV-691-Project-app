import Vue from 'vue'
import Router from 'vue-router'
import Login from './components/Login.vue'
import Register from './components/Register.vue'
import dashhome from './components/dashboard/dashhome.vue'



Vue.use(Router)


export default new Router({

    routes:[
        {path:'/',component:Login},
        {path:'/login',component:Login},
        {path:'/register',component:Register},
        {path:'/dashhome',component:dashhome},


    ]

})