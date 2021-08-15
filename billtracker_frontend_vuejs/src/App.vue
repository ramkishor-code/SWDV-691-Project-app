<template>
  <div id="app">
    <!-- <Login /> -->
    <!-- <h1>App root</h1> -->
    <div>
<router-view />
    </div>
    
  </div>
</template>

<script>
// import Login from './components/Login.vue'
require("bootstrap-css-only/css/bootstrap.min.css");

require("@fortawesome/fontawesome-free/css/all.min.css");
export default {
  name: 'App',
  components: {
  //  Login
  }

}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 0px;
}
</style>
