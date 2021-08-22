<template>
  <div class="managebills">
    <div class="formodal">
      <b-modal id="modal-1" size="xl" hide-footer title="Add Billing Item">
        <b-form @submit.stop.prevent="onSubmit">
          <b-form-input v-model="userid"  hidden></b-form-input>
          <b-form-input v-model="billid"  hidden></b-form-input>

          <div class="row">
            <div class="col-xl-4 col-sm-6 col-xs-12">
              <label>Bill name</label>
              <b-form-input size="sm" v-model="state.billname"></b-form-input>

              <span v-if="v$.billname.$error">
                {{ v$.billname.$errors[0].$message }}
              </span>
            </div>
            <div class="col-xl-4 col-sm-6 col-xs-12">
              <label>bill amount</label>
              <b-form-input
                size="sm"
                v-model="state.bill_amount"
              ></b-form-input>
              <span v-if="v$.bill_amount.$error">
                {{ v$.bill_amount.$errors[0].$message }}
              </span>
            </div>

            <div class="col-xl-4 col-sm-6 col-xs-12">
              <label>bill category</label>
              <br />
              <b-form-select
                v-model="state.bill_category"
                :options="options"
                size="sm"
                class=""
              ></b-form-select>
              <span v-if="v$.bill_category.$error">
                <br />
                {{ v$.bill_category.$errors[0].$message }}
              </span>
            </div>

            <div class="col-xl-4 col-sm-6 col-xs-12">
              <label>bill cycle day</label>
              <br />
              <b-form-select
                v-model="state.bill_cycle_day"
                :options="optionsday"
                class=""
                size="sm"
              ></b-form-select>
              <span v-if="v$.bill_cycle_day.$error">
                <br />
                {{ v$.bill_cycle_day.$errors[0].$message }}
              </span>
            </div>

            <div class="col-xl-4 col-sm-6 col-xs-12">
              <label>bill due day</label>
              <br />
              <b-form-select
                v-model="state.bill_due_day"
                :options="optionsday"
                size="sm"
                class=""
              >
              </b-form-select>
              <span v-if="v$.bill_due_day.$error">
                <br />
                {{ v$.bill_due_day.$errors[0].$message }}
              </span>
            </div>

            <div class="col-xl-4 col-sm-6 col-xs-12">
              <label>billing validity date</label>
              <b-form-datepicker
                id="example-datepicker"
                v-model="state.datevalue"
                class=""
                size="sm"
              ></b-form-datepicker>
              <!-- <p>Value: '{{ datevalue }}'</p> -->
              <span v-if="v$.datevalue.$error">
                {{ v$.datevalue.$errors[0].$message }}
              </span>
            </div>

            <div class="col-xl-4 col-sm-6 col-xs-12">
              <label>Billing status</label>
              <br />
              <b-form-select
                v-model="state.billing_status"
                :options="[1, 0]"
                size="sm"
                class=""
              ></b-form-select>
              <span v-if="v$.billing_status.$error">
                <br />
                {{ v$.billing_status.$errors[0].$message }}
              </span>
            </div>

            <div class="col-sm-12 col-12 text-center">
              <b-button type="submit" variant="primary">Submit</b-button>
            </div>
          </div>
        </b-form>
      </b-modal>
    </div>

    <div class="row card con" style="">
      <h2 class="text-danger badge badge-warning" style="font-size:1rem">Manage Bills</h2>
      <div class="row">
        <div class="col-12">
           
         <h6> <b-button v-b-modal.modal-1 class="btn  " >Add Billing item</b-button></h6>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-2 col-sm-4 col-xl-12 col-md-6 ">
          <table class="table " style="overflow: scroll;overflow:hidden;">
             <thead>
              <tr>
                <th>bill_id</th>
                <th>user_id</th>
                <th>bill_name</th>
                <th>bill_amount</th>
                <th>bill_category</th>
                <th>bill_cycle_day</th>
                <th>bill_due_day</th>
                <th>bill_validity_date</th>
                <!-- <th>created_at</th>
                    <th>modified_at</th> -->
                <th>billing_status</th>
                <th>Action</th>
              </tr>
            </thead>
       
           
            <tbody style="overflow: scroll;">
              <tr v-for="bill in bills" :key="bill.id">
                <td>{{ bill.bill_id }}</td>
                <td>{{ bill.user_id }}</td>
                <td>{{ bill.bill_name }}</td>
                <td>{{ bill.bill_amount }}</td>
                <td>{{ bill.category }}</td>
                <td>{{ bill.bill_cycle_day }}</td>
                <td>{{ bill.bill_due_day }}</td>
                <td>{{ bill.bill_validity_date }}</td>
                <!-- <td>{{bill.created_at}}</td>
                    <td>{{bill.modified_at}}</td> -->
                <td>{{ bill.billing_status }}</td>
                <td>
                  <button
                    class="btn btn-danger "
                    @click="deletebill(bill.bill_id)"
                  >
                    Delete
                  </button>
                  <button
                    class="btn btn-success ml-1"
                    @click="showbill(bill.bill_id)"
                  >
                    Edit
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
 
  
    
     <div class="row card con" style="">
      <h2 class="text-danger badge badge-warning" style="font-size:1rem">Take action on  Upcoming and Pending Bills</h2>
      

      <div class="row">
        <div class="col-xs-2 col-sm-4 col-xl-12 col-md-6 ">
          <table class="table " style="overflow: scroll;">
             <thead>
              <tr>
                <th>bill_id</th>
                
                <th>bill_name</th>
                <th>bill_amount</th>
                <th>bill_category</th>
                <th>bill_cycle_date</th>
                <th>bill_due_date</th>
                
                <!-- <th>created_at</th>
                    <th>modified_at</th> -->
                <th>billing_status</th>
                <th>Action</th>
              </tr>
            </thead>
       
           
            <tbody style="overflow: scroll;">
              <tr v-for="bill in actionbills" :key="bill.id">
                <td>{{ bill.id }}</td>
            
                <td>{{ bill.bill_name }}</td>
                <td>{{ bill.bill_amount }}</td>
                <td>{{ bill.category }}</td>
                <td>{{ bill.bill_cycle_date }}</td>
                <td>{{ bill.bill_due_date }}</td>
                
                <!-- <td>{{bill.created_at}}</td>
                    <td>{{bill.modified_at}}</td> -->
                <td>{{ bill.status }}</td>
                <td>
               <button class="btn btn-primary" @click="pendingup(bill.id)" type="button">Already Paid</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>


  </div>
</template>

<script>
import useValidate from "@vuelidate/core";
import { required, numeric } from "@vuelidate/validators";
import { reactive, computed } from "@vue/composition-api";

import billdataservice from "../../services/billdataservice";
//  import '@/assets/table/css/main.css';
  
import axios from "axios";

import configs from "../../services/config"

export default {
  components: {},
  data() {
    return {
      bills: [],
      actionbills:[],
      userid: null,
       billid: null,
      billname: "",
      bill_amount: "",
      bill_category: null,
      bill_cycle_day: null,
      bill_due_day: null,
      datevalue: null,
      billing_status: null,
      options: [],
      optionsday: [
        { value: null, text: "Please select an option",hidden:true,disabled:true },
        { value: 1, text: "1" },
        { value: 2, text: "2" },
        { value: 3, text: "3" },
        { value: 4, text: "4" },
        { value: 5, text: "5" },
         { value: 6, text: "6" },
        { value: 7, text: "7" },
        { value: 8, text: "8" },
        { value: 9, text: "9" },
         { value: 10, text: "10" },
        { value: 11, text: "11" },
        { value: 12, text: "12" },
        { value: 13, text: "13" },
         { value: 14, text: "14" },
       { value: 15, text: "15" },
        { value: 16, text: "16" },
        { value: 17, text: "17" },
        { value: 18, text: "18" },
        { value: 19, text: "19" },
        { value: 20, text: "20" },
        { value: 21, text: "21" },
        { value: 22, text: "22" },
        { value: 23, text: "23" },
        { value: 24, text: "24" },
        { value: 25, text: "25" },
        { value: 26, text: "26" },
         { value: 7, text: "27" },
          { value: 28, text: "28" },
           { value: 29, text: "29" },
            { value: 30, text: "30" },
             { value: 31, text: "31" },

      ],
    };
  },
  async created() {
    const response = await axios.get((configs.appurl)+"/bill/category");
        console.log(response);

        this.options=response.data;
    this.showallbill();
    this.allbills();

  },

  setup() {
    const state = reactive({
      billname: "",
      bill_amount: "",
      bill_category: null,
      bill_cycle_day: null,
      bill_due_day: null,
      datevalue: null,
      billing_status: null,
    });
    const rules = computed(() => {
      return {
        billname: { required },
        bill_amount: { required, numeric },
        bill_category: { required },
        bill_cycle_day: { required },
        bill_due_day: { required },
        datevalue: { required },
        billing_status: { required },
      };
    });

    const v$ = useValidate(rules, state);

    return { state, v$ };
  },
  methods: {
     async pendingup(billid){
   const response = await axios.get(
        configs.appurl + "/dashboard/status/"+billid
      );
      console.log(response);
        this.showallbill();
    this.allbills();

    
   },
     async allbills(){
        const response = await axios.get(
        configs.appurl + "/dashboard/allactivebills2/"+localStorage.getItem("user")
      );
      console.log(response);
     
             this.actionbills = response.data;

     }
    ,
    showbill(id) {
      billdataservice
        .showbill(id)
        .then((res) => {
          console.log("here comes showbill");
          console.log(res[0]);
          this.billid=res[0].bill_id;
          this.userid=res[0].user_id;
          this.billname=this.state.billname= res[0].bill_name;
          this.bill_amount=this.state.bill_amount=res[0].bill_amount;
            this.bill_category=this.state.bill_category= res[0].bill_category;
            this.bill_cycle_day=this.state.bill_cycle_day= res[0].bill_cycle_day;
            this.bill_due_day=this.state.bill_due_day= res[0].bill_due_day;
            this.datevalue=this.state.datevalue= res[0].bill_validity_date;
            this.billing_status=this.state.billing_status= res[0].billing_status;
           this.showallbill();
          this.$bvModal.show("modal-1");
        })
        .catch((e) => {
          console.log(e);
        });
    },
    deletebill(id) {
      billdataservice
        .deletebill(id)
        .then(() => {
          this.$toast.open({
            message: "Billing item deleted successfully",
            type: "error",
            position: "top",
          });

             this.showallbill();
    this.allbills();
        })
        .catch((e) => {
          console.log(e);
        });
    },
    showallbill() {
      billdataservice
        .showallbill(localStorage.getItem("user"))
        .then((response) => {
          this.bills = response;
          console.log(response);
        })
        .catch((e) => {
          console.log(e);
        });
    },

    async onSubmit() {
      this.v$.$validate(); // checks all inputs
      if (!this.v$.$error) {
        // if ANY fail validation
        // alert('Form successfully submitted.')
        if(this.billid==undefined){
          
        const data = {
          user_id: (this.userid = localStorage.getItem("user")),
          bill_name: (this.billname = this.state.billname),
          bill_amount: (this.bill_amount = this.state.bill_amount),
          bill_category: (this.bill_category = this.state.bill_category),
          bill_cycle_day: (this.bill_cycle_day = this.state.bill_cycle_day),
          bill_due_day: (this.bill_due_day = this.state.bill_due_day),
          bill_validity_date: (this.datevalue = this.state.datevalue),
          billing_status: (this.billing_status = this.state.billing_status),
        };
        console.log(data);
        //  const toke=localStorage.getItem('token');
        //console.log(toke);
        const toke =
          "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTQwYTM1ODg5MmU2MWM4ZjNjYzRhNzI1YjQzOTVlMjEzMWJiNWI3NDFmYjQzMWMzYmU2ZTdjMTRmOGZmYjU3ODE3NWQzZGNlNWRlMTdlNTYiLCJpYXQiOjE2Mjg0MDU1MzcsIm5iZiI6MTYyODQwNTUzNywiZXhwIjoxNjU5OTQxNTM3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.o5sBufXxuKUu7AiU8LVTIVrqCMCdpIsEvv31d0PXsNr8oM7QW18ZYwYDkCLycVaCB8Qy6hK4Hf8V5y_yCQTYJ2PSt4e2TYO6LfqE_bmpbBeZeZI2plrHDMJq3SV86zWuh__WVu4sFsrD2McJuWZCA3DDRQBWzGiA-WOsb1qqRXCU7pw8KPjpVeGDa5Zl7KFgWohi7cn7lOZ-5CnfVL7pg8Sd8Njx4VZ7reM4SjcKlTtS3OS8xUHBt5uDMrkWO5NxureKoAvSQGH-DnlpSFO0gnj4D6xYgE4tpTO-PWr38B9M0A45oCo4L384h4tnG8WUiU3N3AsG4GCIwK_1U3x8_CszET8jN6ii5ez7nopirNyExeeSHnBCYGkqy9Q7PJBObP1qk-7rACmCZnz3FGudFqnNqcMv0OENQuwTnVcxeN3CSpp9DrvRAXroC4vyATNUCtzmugK-DIY_BH3apdFI-Y-L4sbXCxXLOtIPVxTjqnHWUf-BNcMGnltGhxKkugKN4xtgnD_dM9nd5Hhe0ZBp-lKIJBIBkevm2ypyGBXmutjHJ0U-dzkCbSiFC0CRIzhHZNsDVAn0VqBrGUZiC2OIAwa1_qkPhquTcKXdzHKQhiAClBGddW9HQnVnFpWtZbAGm1Hc-pspt4hqtDRAe82vtkF7M-nKQ-LrSu8i5_fRCcc";
        const config = {
          headers: { Authorization: `Bearer ${toke}` },
        };
        const response = await axios.post(
          (configs.appurl)+`/bill/create`,
          data,
          config
        );
        console.log(response);

        this.$bvModal.hide("modal-1");
        
           this.showallbill();
    this.allbills();
        this.$toast.open({
          message: "Billing item added successfully",
          type: "success",
          position: "top",
          // all of other options may go here
        });
      }
      else{
        
          const data = {
          bill_id:this.billid,
          user_id: (this.userid = localStorage.getItem("user")),
          bill_name: (this.billname = this.state.billname),
          bill_amount: (this.bill_amount = this.state.bill_amount),
          bill_category: (this.bill_category = this.state.bill_category),
          bill_cycle_day: (this.bill_cycle_day = this.state.bill_cycle_day),
          bill_due_day: (this.bill_due_day = this.state.bill_due_day),
          bill_validity_date: (this.datevalue = this.state.datevalue),
          billing_status: (this.billing_status = this.state.billing_status),
        };
        console.log(data);
        //  const toke=localStorage.getItem('token');
        //console.log(toke);
        const toke =
          "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTQwYTM1ODg5MmU2MWM4ZjNjYzRhNzI1YjQzOTVlMjEzMWJiNWI3NDFmYjQzMWMzYmU2ZTdjMTRmOGZmYjU3ODE3NWQzZGNlNWRlMTdlNTYiLCJpYXQiOjE2Mjg0MDU1MzcsIm5iZiI6MTYyODQwNTUzNywiZXhwIjoxNjU5OTQxNTM3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.o5sBufXxuKUu7AiU8LVTIVrqCMCdpIsEvv31d0PXsNr8oM7QW18ZYwYDkCLycVaCB8Qy6hK4Hf8V5y_yCQTYJ2PSt4e2TYO6LfqE_bmpbBeZeZI2plrHDMJq3SV86zWuh__WVu4sFsrD2McJuWZCA3DDRQBWzGiA-WOsb1qqRXCU7pw8KPjpVeGDa5Zl7KFgWohi7cn7lOZ-5CnfVL7pg8Sd8Njx4VZ7reM4SjcKlTtS3OS8xUHBt5uDMrkWO5NxureKoAvSQGH-DnlpSFO0gnj4D6xYgE4tpTO-PWr38B9M0A45oCo4L384h4tnG8WUiU3N3AsG4GCIwK_1U3x8_CszET8jN6ii5ez7nopirNyExeeSHnBCYGkqy9Q7PJBObP1qk-7rACmCZnz3FGudFqnNqcMv0OENQuwTnVcxeN3CSpp9DrvRAXroC4vyATNUCtzmugK-DIY_BH3apdFI-Y-L4sbXCxXLOtIPVxTjqnHWUf-BNcMGnltGhxKkugKN4xtgnD_dM9nd5Hhe0ZBp-lKIJBIBkevm2ypyGBXmutjHJ0U-dzkCbSiFC0CRIzhHZNsDVAn0VqBrGUZiC2OIAwa1_qkPhquTcKXdzHKQhiAClBGddW9HQnVnFpWtZbAGm1Hc-pspt4hqtDRAe82vtkF7M-nKQ-LrSu8i5_fRCcc";
        const config = {
          headers: { Authorization: `Bearer ${toke}` },
        };
        const response = await axios.post(
          (configs.appurl)+"/bill/edit",
          data,
          config
        );
        console.log(response);
        this.billid=undefined;
        this.$bvModal.hide("modal-1");
        this.showallbill();
        this.$toast.open({
          message: "Billing item updated successfully",
          type: "success",
          position: "top",
          // all of other options may go here
        });



      }} else {
        alert("Form failed validation");
        const data = {
          user_id: (this.userid = localStorage.getItem("user")),
          bill_name: this.state.billname,
          bill_amount: this.bill_amount,
          bill_category: this.bill_category,
          bill_cycle_day: this.bill_cycle_day,
          bill_due_day: this.bill_due_day,
          bill_validity_date: this.datevalue,
          billing_status: this.billing_status,
        };
        console.log(data);
      }
    },
  },
};
</script>

<style scoped>


table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.btn-primary {
    color: #fff;
    background-color: #1A237E;
    border-color: #1A237E;
}
.con{
  margin-bottom: 100px;
  width: 70rem;
}
@media only screen and (max-width: 600px) {
 table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 25%;
}
.con{
  width: 50rem;
  margin-left:20px;
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
.managebills {
  display: flex;
  flex-direction: column ;
  justify-content: center;
  align-items: center;
  height: 100%;
  width: 100%;
  font-size: 40px;
  color: rgb(167, 167, 167);
  font-weight: 600;
}
button{
  padding:4px;
  font-size:10px;
}
</style>