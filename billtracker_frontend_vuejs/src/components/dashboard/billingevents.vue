<template>
    <div class="billingevents">
         <vue-event-calendar :events="bills"></vue-event-calendar>
</div>
</template>

<script>
import axios from "axios";
import configs from "../../services/config";
export default {

  data () {
    return {
      bills: []
    }
  },
    created() {
    this.show_all_bill();
  
  },
  methods:{
     async show_all_bill(){
   const response = await axios.get(
        configs.appurl + "/dashboard/allactivebills/"+localStorage.getItem("user")
      );
      console.log(response);
     
             this.bills = response.data;
    
   },
  }
}
</script>

<style scoped>



.billingevents {
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