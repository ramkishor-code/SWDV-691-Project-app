import Vue from 'vue'
import App from './App.vue'
import router from './router'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { FormPlugin } from 'bootstrap-vue'
import { BForm } from 'bootstrap-vue'
import axios from 'axios' 
import 'vue-event-calendar/dist/style.css' //^1.1.10, CSS has been extracted as one file, so you can easily update it.
import vueEventCalendar from 'vue-event-calendar'
// locale can be 'zh' , 'en' , 'es', 'pt-br', 'ja', 'ko', 'fr', 'it', 'ru', 'de', 'vi', 'ua', 'no, 'no-nn'
Vue.use(vueEventCalendar, {locale: 'en'}) 


Vue.component('b-form', BForm)
Vue.use(FormPlugin)
import VueToast from 'vue-toast-notification';
// Import one of the available themes
//import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.config.productionTip = false

axios.interceptors.request.use(function (config) {
  // Do something before request is sent
  document.getElementById("spin").style.display = "block";
  return config;
}, function (error) {
  // Do something with request error
  return Promise.reject(error);
});

// Add a response interceptor
axios.interceptors.response.use(function (response) {
  // Any status code that lie within the range of 2xx cause this function to trigger
  // Do something with response data
 // var spin = document.getElementById('spin');

  document.getElementById("spin").style.display = "none";
  return response;
}, function (error) {
  // Any status codes that falls outside the range of 2xx cause this function to trigger
  // Do something with response error
  // document.body.
 
  return Promise.reject(error);
});



Vue.use(VueToast);
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
