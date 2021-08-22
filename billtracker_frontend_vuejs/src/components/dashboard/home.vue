<template>
  <div class="home">
    <div class="row m-5">
      <div class="col-12">
        <div class="row">
          <h1 class="text-danger badge badge-large badge-warning">
            Upcoming Bills Alerts
          </h1>
          <div
            class="m-4 col-xl-4 col-md-3 col-xs-12 col-sm-12"
            v-for="bill2 in upcomingbills"
            :key="bill2.idyt"
          >
            <div class="card bg-light">
              <div class="header">
                {{ bill2.bill_name }}
              </div>

              <div class="card-body row">
                <div class="col-xl-12 col-xs-12 col-sm-12">
                  <h6><b>Bill Category</b></h6>
                  <p>{{ bill2.category }}</p>
                </div>
                <div class="col-xl-12 col-xs-12 col-sm-12">
                  <h6><b>Bill Amount</b></h6>
                  <p>${{ bill2.bill_amount }}</p>
                </div>
              </div>
              <div class="card-footer">
                <div class="d-grid ">
                  <button class="btn btn-primary" @click="pendingup(bill2.id)" type="button">Already Paid</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-2 mt-5">
            <router-link to="/report">
              <h6><small>Show more.....</small></h6></router-link
            >
          </div>
        </div>

        <div class="row">
          <h2 class="text-danger badge badge-warning">Pending Bills Alerts</h2>
          <div
            class="m-4 col-xl-4 col-md-3 col-xs-12 col-sm-12"
            v-for="bill in pendingbills"
            :key="bill.idy"
          >
            <div class="card bg-light">
              <div class="header">
                {{ bill.bill_name }}
              </div>

              <div class="card-body row">
                <div class="col-xl-12 col-xs-12 col-sm-12">
                  <h6><b>Bill Category</b></h6>
                  <p>{{ bill.category }}</p>
                </div>
                <div class="col-xl-12 col-xs-12 col-sm-12">
                  <h6><b>Bill Amount</b></h6>
                  <p>${{ bill.bill_amount }}</p>
                </div>
              </div>
              <div class="card-footer">
                <div class="d-grid ">
                  <button class="btn btn-primary" @click="pendingup(bill.id)" type="button">Already Paid</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-2 mt-5">
            <router-link to="/report">
              <h6><small>Show more.....</small></h6></router-link
            >
          </div>
        </div>
        <!-- here we start new row for graphs -->
        <div class="row">
          <div class="col-xl-12">
             <b-card text-variant="dark" header="Category Wise total bill amount" class="text-center">
        <!-- <b-card-text>hello</b-card-text> -->
        <chart :chart-data="datacollection"></chart>
      </b-card>
         

          </div>
        
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import configs from "../../services/config";
 import Chart from "./Chart.js";
export default {
  components: {
        Chart
      },
       mounted() {
    
      },
  data() {
    return {
      upcomingbills: [],
      pendingbills: [],
    };
  },
  created() {
    this.show_upcoming_bill();
    this.show_pending_bill();
     this.fillData();
  },
  methods: {
    
   
        
      
    

 async pendingup(billid){
   const response = await axios.get(
        configs.appurl + "/dashboard/status/"+billid
      );
      console.log(response);
      this.show_upcoming_bill();
    this.show_pending_bill();

    
   },
    async show_upcoming_bill() {
      const response = await axios.get(
        configs.appurl + "/dashboard/upcoming/"+localStorage.getItem("user")
      );
      console.log(response);

      this.upcomingbills = response.data;
    },
    async show_pending_bill() {
      const response = await axios.get(configs.appurl + "/dashboard/pending/"+localStorage.getItem("user"));
      console.log(response);

      this.pendingbills = response.data;
      
    },
  },
};
</script>

<style scoped>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  transition: 0.3s;
  width: 100%;
}
.btn-primary {
    color: #fff;
    background-color: #1A237E;
    border-color: #1A237E;
    
}
.home {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  width: 100%;
  font-size: 1rem;
  color: rgb(167, 167, 167);
}
td {
  margin: 0px;
}
</style>