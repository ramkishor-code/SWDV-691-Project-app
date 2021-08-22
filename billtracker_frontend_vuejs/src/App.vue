<template>
  <div id="app">
  
          <div class=" " id="spin"  style="
                                            background: rgba(0,0,0,.5) url('') no-repeat;
                                              width:100%;
                                              height:100%;
                                              position:fixed;
                                              top:0;
                                              left:0;
                                              z-index:99999;
                                              display: none;
        
                                 ">
                           <div class="row " style="position:fixed;top:50%;left:40%;z-index:99999">
                            <div class="col-3">
                              
                            </div>
                             <div class="col-6">
                              <div class="row">
                                  <div class="col-5 " >
                                     <div class="spinner-border mr-0"  role="status">
                                         <span class="sr-only"></span>
                                      </div>
                                  </div>
                               <div class="col-7 "  >
                            
                                  <strong class="ml-0">Loading...</strong>
                              </div>
                              </div>
                            </div>
                             <div class="col-3">
                              
                            </div>
                          
                              
                          
                                                
                        </div>  
                        </div> 


    <!-- <Login /> -->
    <!-- <h1>App root</h1> -->
    <div>
<router-view />
    </div>
    
  </div>
</template>

<script>


require("bootstrap-css-only/css/bootstrap.min.css");

require("@fortawesome/fontawesome-free/css/all.min.css");






export default {
  name: 'App',
  components: {
  //  Login
  },
  methods:{
    
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


.loading-indicator:after{
    content: 'Loading';
    position: fixed;
    width: 100%;
    top: 50%;
    left: 0;
    z-index: 1001;
    color:white;
    text-align:center;
    font-weight:bold;
    font-size:1.5rem;        
}
</style>
