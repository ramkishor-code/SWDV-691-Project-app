<template>
  <div class="managebills">
    <div>
      <b-button v-b-modal.modal-1>Add Billing item</b-button>

      <b-modal id="modal-1" size="xl" hide-footer title="Add Billing Item">
        <b-form @submit.stop.prevent="onSubmit">
          <b-form-input v-model="userid" value="1" hidden></b-form-input>

          <div class="row">
            <div class="col-xl-4 col-sm-6 col-xs-12">
              <label>Bill name</label>
              <b-form-input v-model="state.billname"></b-form-input>

              <span v-if="v$.billname.$error">
                {{ v$.billname.$errors[0].$message }}
              </span>
            </div>
            <div class="col-xl-4 col-sm-6 col-xs-12">
              <label>bill amount</label>
              <b-form-input v-model="state.bill_amount"></b-form-input>
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
              ></b-form-select>
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
                size="lg"
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
  </div>
</template>

<script>
import useValidate from "@vuelidate/core";
import { required, numeric } from "@vuelidate/validators";
import { reactive, computed } from "@vue/composition-api";
import axios from 'axios' 
export default {
  data() {
    return {
      userid:null,
      billname: "",
      bill_amount: "",
      bill_category: null,
      bill_cycle_day: null,
      bill_due_day: null,
      datevalue:null,
      billing_status:null,
      options: [
        { value: null, text: "Please select an option", hidden: true },
        { value: "1", text: "category 1" },
        { value: "2", text: "category 1" },
        { value: "3", text: "category 1" },
        { value: "4", text: "category 1" },
      ],
      optionsday: [
        { value: null, text: "Please select an option" },
        { value: 1, text: "1" },
        { value: 2, text: "2" },
        { value: 3, text: "3" },
        { value: 4, text: "4" },
        { value: 5, text: "5" },
      ],
    };
  },

  setup() {
    const state = reactive({
      billname: "",
      bill_amount: "",
      bill_category: null,
      bill_cycle_day: null,
      bill_due_day: null,
      datevalue:null,
       billing_status:null
    });
    const rules = computed(() => {
      return {
        billname: { required },
        bill_amount: { required, numeric },
        bill_category: { required },
        bill_cycle_day: { required },
        bill_due_day: { required },
        datevalue:{ required },
         billing_status:{required},
      };
    });

    const v$ = useValidate(rules, state);

    return { state, v$ };
  },
  methods: {
    
    async onSubmit() {
      this.v$.$validate(); // checks all inputs
      if (!this.v$.$error) { // if ANY fail validation
        // alert('Form successfully submitted.')
      
      const  data= {
        "user_id": this.userid=localStorage.getItem('user'),
        "bill_name":this.billname=this.state.billname,
        "bill_amount":this.bill_amount=this.state.bill_amount,
        "bill_category": this.bill_category=this.state.bill_category,
        "bill_cycle_day": this.bill_cycle_day=this.state.bill_cycle_day,
        "bill_due_day": this.bill_due_day=this.state.bill_due_day,
        "bill_validity_date":this.datevalue=this.state.datevalue,
        "billing_status":this.billing_status=this.state.billing_status
         
         }
         console.log(data);
        //  const toke=localStorage.getItem('token');
         //console.log(toke);
             const    toke="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTQwYTM1ODg5MmU2MWM4ZjNjYzRhNzI1YjQzOTVlMjEzMWJiNWI3NDFmYjQzMWMzYmU2ZTdjMTRmOGZmYjU3ODE3NWQzZGNlNWRlMTdlNTYiLCJpYXQiOjE2Mjg0MDU1MzcsIm5iZiI6MTYyODQwNTUzNywiZXhwIjoxNjU5OTQxNTM3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.o5sBufXxuKUu7AiU8LVTIVrqCMCdpIsEvv31d0PXsNr8oM7QW18ZYwYDkCLycVaCB8Qy6hK4Hf8V5y_yCQTYJ2PSt4e2TYO6LfqE_bmpbBeZeZI2plrHDMJq3SV86zWuh__WVu4sFsrD2McJuWZCA3DDRQBWzGiA-WOsb1qqRXCU7pw8KPjpVeGDa5Zl7KFgWohi7cn7lOZ-5CnfVL7pg8Sd8Njx4VZ7reM4SjcKlTtS3OS8xUHBt5uDMrkWO5NxureKoAvSQGH-DnlpSFO0gnj4D6xYgE4tpTO-PWr38B9M0A45oCo4L384h4tnG8WUiU3N3AsG4GCIwK_1U3x8_CszET8jN6ii5ez7nopirNyExeeSHnBCYGkqy9Q7PJBObP1qk-7rACmCZnz3FGudFqnNqcMv0OENQuwTnVcxeN3CSpp9DrvRAXroC4vyATNUCtzmugK-DIY_BH3apdFI-Y-L4sbXCxXLOtIPVxTjqnHWUf-BNcMGnltGhxKkugKN4xtgnD_dM9nd5Hhe0ZBp-lKIJBIBkevm2ypyGBXmutjHJ0U-dzkCbSiFC0CRIzhHZNsDVAn0VqBrGUZiC2OIAwa1_qkPhquTcKXdzHKQhiAClBGddW9HQnVnFpWtZbAGm1Hc-pspt4hqtDRAe82vtkF7M-nKQ-LrSu8i5_fRCcc";
       const config = {
                     headers: { Authorization: `Bearer ${toke}` }
                        };
        const response = await axios.post('http://localhost:8000/api/bill/create',data,config);
         console.log(response);
      } else {
        alert('Form failed validation')
         const  data= {
        "user_id": this.userid=localStorage.getItem('user'),
        "bill_name":this.state.billname,
        "bill_amount":this.bill_amount,
        "bill_category":this.bill_category,
        "bill_cycle_day": this.bill_cycle_day,
        "bill_due_day": this.bill_due_day,
        "bill_validity_date":this.datevalue,
        "billing_status":this.billing_status
         
         }
         console.log(data);
      }
    },
  },
};
</script>

<style scoped>
.managebills {
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