<template>
    <div class="home">
      
     <div class="row">
         <div class="col-12">

             <div class="row">
                 <h2 class="text-danger">Upcoming Bills</h2>
             <div class="col-2">
                 <div class="card bg-dark">
                  <div class="card-body">
                      bill1
                  </div>
                 </div>
             </div>

             <div class="col-2">
                 <div class="card bg-dark">
                  <div class="card-body">
                       bill1
                  </div>
                 </div>
             </div>
             <div class="col-2">
                 <div class="card bg-dark">
                  <div class="card-body">
                       bill1
                  </div>
                 </div>
             </div>
             <div class="col-2">
                 <div class="card bg-dark">
                  <div class="card-body">
                       bill1
                  </div>
                 </div>
             </div>
            
             <div class="col-2 mt-5">
                <router-link to="/"> <h6><small>Show more.....</small></h6></router-link>
               
             </div>
             


             </div>

             <div class="row">
                       <h2 class="text-danger">Pending Bills</h2>
             <div class="col-2">
                 <div class="card bg-dark">
                  <div class="card-body">
                       bill1
                  </div>
                 </div>
             </div>

             <div class="col-2">
                 <div class="card bg-dark">
                  <div class="card-body">
                       bill1
                  </div>
                 </div>
             </div>
             <div class="col-2">
                 <div class="card bg-dark">
                  <div class="card-body">
                       bill1
                  </div>
                 </div>
             </div>
              <div class="col-2">
                 <div class="card bg-dark">
                  <div class="card-body">
                       bill1
                  </div>
                 </div>
             </div>
            
              <div class="col-2 mt-5">
                <router-link to="/"> <h6><small>Show more.....</small></h6></router-link>
               
             </div>
             </div>
   <!-- here we start new row for graphs -->
             <div class="row">
               <div class="col-6">
                   
               
               </div>
               <div class="col-6">
                                   
               </div>
             </div>

         </div>
     </div>
    </div>
    
</template>

<script>
    export default {
        
    }
</script>

<style scoped>
.home {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
    font-size: 40px;
    color: rgb(167, 167, 167);
    font-weight: 600;
}
</style>