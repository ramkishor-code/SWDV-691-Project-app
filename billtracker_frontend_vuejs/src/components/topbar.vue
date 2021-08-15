<template>
<div class="up">
<div class="">
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="../assets/logo.png" alt="" width="150" >
    </a>
    <ul>
     <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome! {{this.username}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Home</a></li>
            <li> <router-link to="/" class="dropdown-item" href="#">Logout</router-link></li>
          
        
          </ul>
        </li>
    </ul>  
  </div>
</nav>
</div>
</div>
    
</template>
<style scoped>
.up{
    height:6vh ;
    z-index: 1;
}
ul {
  list-style-type: none;
}
</style>
<script>


export default {
  data(){
      return {
       username:localStorage.getItem("username"),
      }
      
  }
}
</script>
