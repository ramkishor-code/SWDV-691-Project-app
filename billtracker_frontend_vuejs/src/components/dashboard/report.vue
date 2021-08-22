<template>
  <div class="report">
      
     <div class="row card con" style="">
      <h2 class="text-danger badge badge-warning" style="font-size:1rem">Upcoming Bills report</h2>
      

      <div class="row">
        <div class="col-xs-2 col-sm-4 col-xl-12 col-md-6 ">
    <table
      class="table"
      id="example"
      style="width:100%,height:10%"
    >
      <thead>
        <tr>
          <th>Bill id</th>
          <th>Amount</th>
          <th>Name</th>
          <th>Category</th>
          <th>Cycle date</th>
          <th>Due date</th>
        </tr>
      </thead>
      <tbody>
          <tr>
                <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          </tr>
        <tr v-for="user in upcomingbills" :key="user.id">

          <td>{{ user.id }}</td>
          <td>$ {{ user.bill_amount }}</td>
          <td>{{ user.bill_name }}</td>
          <td>{{ user.category }}</td>
          <td>{{ user.bill_cycle_date }}</td>
          <td>{{ user.bill_due_date }}</td>


        </tr>
      </tbody>
    </table>
        </div>
        </div>
        </div>
        <div class="row card con" style="">
      <h2 class="text-danger badge badge-warning" style="font-size:1rem"> Pending Bills Report</h2>
      

      <div class="row">
        <div class="col-xs-2 col-sm-4 col-xl-12 col-md-6 ">
    <table
      class="table"
      id="example2"
      style="width:100%,height:10%"
    >
      <thead>
        <tr>
          <th>Bill id</th>
          <th>Amount</th>
          <th>Name</th>
          <th>Category</th>
          <th>Cycle date</th>
          <th>Due date</th>
        </tr>
      </thead>
      <tbody>
          <tr>
                <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          </tr>
        <tr v-for="user in  pendingbills" :key="user.id">

          <td>{{ user.id }}</td>
          <td>$ {{ user.bill_amount }}</td>
          <td>{{ user.bill_name }}</td>
          <td>{{ user.category }}</td>
          <td>{{ user.bill_cycle_date }}</td>
          <td>{{ user.bill_due_date }}</td>


        </tr>
      </tbody>
    </table>
        </div>
        </div>
        </div>
  </div>
</template>

<script>
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
import axios from "axios";
import configs from "../../services/config";
export default {
  async mounted() {
  
    
    await axios.get(
        configs.appurl + "/dashboard/upcoming2/"+localStorage.getItem("user")
      ).then((res) => {
      //this.users = res.data;
      this.upcomingbills = res.data;
    
       $("#example").DataTable({
           "bDestroy": true,
        dom: "Bfrtip",
    
      });
    });

      await axios.get(
        configs.appurl + "/dashboard/pending2/"+localStorage.getItem("user")
      ).then((res) => {
      //this.users = res.data;
      this.pendingbills = res.data;
    
       $("#example2").DataTable({
           "bDestroy": true,
        dom: "Bfrtip",
    
      });
    });
  },
  data: function () {
    return {
      upcomingbills: [],
      pendingbills: [],
    };
  },
};
</script>

<style scoped>
@import "https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css";
@import "https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css";
.report {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100%;
  width: 100%;
  
  /* font-size: 40px; */
  color: rgb(167, 167, 167);
  /* font-weight: 600; */
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;

  
}
.con{
    margin-top: 4%;
  margin-bottom: 100px;
  width: 50rem;
  box-shadow:  20px 20px 33px #23359e,
             20px 20px 33px #1acdfa;
  
}
@media only screen and (max-width: 600px) {
 table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 25%;
}
.con{
  width: 30rem;
  margin-left:20px;
    box-shadow:  20px 20px 33px #23359e,
             20px 20px 33px #1acdfa;
}
}

td,
th {
  border: 1px solid #dddddd;
  text-align: left;
padding: 0.25rem;
  
  font-size: 0.8rem;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.binput {
  background-color: #303245;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
}
</style>