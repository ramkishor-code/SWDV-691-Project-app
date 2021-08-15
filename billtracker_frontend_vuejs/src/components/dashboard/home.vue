<template>
  <div class="home">
    <div class="row m-5">
      <div class="col-12">
        <div class="row">
          
          <h1 class="text-danger badge badge-large badge-warning">Upcoming Bills</h1>
          <div class="col-4 m-4" v-for="bill in bills" :key="bill.id">
            <div class="card bg-light">
              <div class="header">
                {{ bill.bill_name }}
              </div>
           
              <div class="card-body row">
                <div class="col-6">
                  <h6><b>Bill Category</b></h6>
                  <p>{{ bill.category }}</p>
                </div>
                <div class="col-6">
                        <h6><b>Bill Amount</b></h6>
                  <p>{{ bill.bill_amount }}</p>
                </div>
              

              </div>
            </div>
          </div>

          <div class="col-2 mt-5">
            <router-link to="/">
              <h6><small>Show more.....</small></h6></router-link
            >
          </div>
        </div>

        <div class="row">
          <h2 class="text-danger badge badge-warning">Pending Bills</h2>
          <div class="col-2"></div>

          <div class="col-2 mt-5">
            <router-link to="/">
              <h6><small>Show more.....</small></h6></router-link
            >
          </div>
        </div>
        <!-- here we start new row for graphs -->
        <div class="row">
          <div class="col-6"></div>
          <div class="col-6"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      bills: [],
    };
  },
  created() {
    this.show_upcoming_bill();
  },
  methods: {
    async show_upcoming_bill() {
      const response = await axios.get(
        "http://localhost:8000/api/dashboard/upcoming/1"
      );
      console.log(response);

      this.bills = response.data;
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