<template>
  <div class="a">
  

    <div class="container-fluid">
      <div class="card border-0">
        <div class="row d-flex" style="margin-bottom:12%">
          <div class="col-lg-4">
            <div class="card1 pb-1">
              <div class="row">
                <img alt="company logo" src="../assets/logo.png" class="logo" />
              </div>
              <div
                class="row px-3 justify-content-center mt-4 mb-5 border-line"
              >
                <img src="https://i.imgur.com/uNGdWHi.png" class="image" />
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card2 card border-0 py-3">
       
              <div class="row px-3 mb-3">
                <strong class="text-center bg-blue p-4 mb-5">Register</strong>
         
              </div>
              <form @submit.stop.prevent="handlesubmit">
              <div class="row px-3">
                  <div class="col">
                 <label class="mb-1">
                  <h6 class="mb-0 text-sm">Full Name</h6>
                </label>
                <input
                  class="mb-4"
                  type="text"
                   v-model="state.fullname"
                  placeholder="Enter your full name"
                />
                 <span v-if="v$.fullname.$error" class="text-danger">
               <p>Fullname is required</p>
              </span>

                  </div>
                    <div class="col">
                          <label class="mb-1">
                  <h6 class="mb-0 text-sm">Phone Number</h6>
                </label>
                <input
                  type="text"
                  class="mb-4"
                  v-model="state.pnumber"
                  placeholder="Enter valid phone number"
                />
                 <span v-if="v$.pnumber.$error" class="text-danger">
               <p>Phone number is invalid</p>
              </span>
                  </div>
                  
                  <div class="col">
 <label class="mb-1">
                  <h6 class="mb-0 text-sm">Email Address</h6>
                </label>
                <input
                  class="mb-4"
                  type="text"
                  v-model="state.email"
                  placeholder="Enter a valid email address"
                />
                 <span v-if="v$.email.$error" class="text-danger">
               <p>Email is required</p>
              </span>
                  </div>
              </div>
              <div class="row px-3">
          
                    <div class="col">
                          <label class="mb-1">
                  <h6 class="mb-0 text-sm">Password</h6>
                </label>
                <input
                  type="password"
                  v-model="state.password"
                  placeholder="Enter password"
                />
                 <span v-if="v$.password.$error" class="text-danger">
               <p>password is required</p>
              </span>
                  </div>
                    <div class="col">
                         <label class="mb-1">
                  <h6 class="mb-0 text-sm"> Confirm-Password</h6>
                </label>
                <input
                  type="password"
                  v-model="state.confpassword"
                  placeholder="Enter password Again"
                /> 
                 <span v-if="v$.confpassword.$error" class="text-danger">
               <p>Confirm Password is invalid </p>
              </span>
                  </div>
              </div>
            
              <div class="row px-3 mb-4">
            
              </div>
              <div class="row mb-3 mt-5 px-3">
                <button type="submit" class="btn btn-blue text-center">
                  Sign-Up
                </button>&nbsp;&nbsp;
                <button class="btn btn-blue text-center" @click="$router.push('/')">Back</button>
              </div>
              <div class="row mb-4 mt-3 px-3">
                <small class="font-weight-bold"
                  >Already have an account?
                  <router-link to="/login" class="text-danger"
                    >Sign-in</router-link
                  ></small
                >
              </div>
                </form>
            </div>
          </div>
        </div>
        <div class="bg-blue mt-4 p-4"  >
          <div class="row" style="margin: 0px">
            <div class="col-6">
              <small class="ml-auto mr-auto"
                >Copyright &copy; 2021. All rights reserved.</small
              >
            </div>
            <div class="col-6">
         <!--     <div class="">
                <span
                  class="fa fa-facebook mr-5"
                  style="margin-right: 40px"
                ></span>
                <span
                  class="fa fa-google-plus mr-4"
                  style="margin-right: 40px"
                ></span>
                <span
                  class="fa fa-linkedin mr-4 text-sm"
                  style="margin-right: 40px"
                ></span>
                <span
                  class="fa fa-twitter mr-4 mr-sm-5 text-sm"
                  style="margin-right: 40px"
                ></span>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import configs from "../services/config"
import useValidate from "@vuelidate/core";
import { required,numeric } from "@vuelidate/validators";
import { reactive, computed } from "@vue/composition-api";

export default {
    
  name: "Register",
    data(){
      return {
          email:null,
          password:null,
          fullname:null,
          confpassword:null,
          pnumber:null

        }
 
  },
    setup() {
    const state = reactive({
       email:null,
          password:null,
          fullname:null,
          confpassword:null,
          pnumber:null

    });
    const rules = computed(() => {
      return {
        email: { required },
         fullname:{ required },
        password: { required },
        confpassword:{ required },
          pnumber:{ required,numeric,maxLength: 10, }
     
      };
    });

    const v$ = useValidate(rules, state);

    return { state, v$ };
  },
  
  methods:{
     async handlesubmit(){

       this.v$.$validate(); // checks all inputs
      if (!this.v$.$error) {
          const data= await axios.post((configs.appurl)+'/auth/signup',{
              "name":this.state.fullname,
                "email":this.state.email,
              "password":this.state.password,
              "phone_number":this.state.pnumber
          });
          console.log(data);
           this.$router.push('/login');
      }
     }
  }
};
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.a{
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 80px;
}
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}

body {
  color: #000;
  overflow-x: hidden;
  height: 100%;
  background-color: #b0bec5;
  background-repeat: no-repeat;
}

.card0 {
  box-shadow: 0px 4px 8px 0px #757575;
  border-radius: 10px;
}

.card2 {
  margin: 0px 40px;
}

.logo {
  width: 300px;

  margin-top: 20px;
  margin-left: 35px;
}

.image {
  width: 360px;
  height: 280px;
}

.border-line {
  border-right: 1px solid #eeeeee;
}

.facebook {
  background-color: #3b5998;
  color: #fff;
  font-size: 18px;
  padding-top: 5px;
  border-radius: 50%;
  width: 35px;
  height: 35px;
  cursor: pointer;
}

.twitter {
  background-color: #1da1f2;
  color: #fff;
  font-size: 18px;
  padding-top: 5px;
  border-radius: 50%;
  width: 35px;
  height: 35px;
  cursor: pointer;
}

.linkedin {
  background-color: #2867b2;
  color: #fff;
  font-size: 18px;
  padding-top: 5px;
  border-radius: 50%;
  width: 35px;
  height: 35px;
  cursor: pointer;
}

.line {
  height: 1px;
  width: 45%;
  background-color: #e0e0e0;
  margin-top: 10px;
}

.or {
  width: 10%;
  font-weight: bold;
}

.text-sm {
  font-size: 14px !important;
}

::placeholder {
  color: #bdbdbd;
  opacity: 1;
  font-weight: 300;
}

:-ms-input-placeholder {
  color: #bdbdbd;
  font-weight: 300;
}

::-ms-input-placeholder {
  color: #bdbdbd;
  font-weight: 300;
}

input,
textarea {
  padding: 10px 12px 10px 12px;
  border: 1px solid lightgrey;
  border-radius: 2px;
  margin-bottom: 5px;
  margin-top: 2px;
  width: 100%;
  box-sizing: border-box;
  color: #2c3e50;
  font-size: 14px;
  letter-spacing: 1px;
}

input:focus,
textarea:focus {
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  border: 1px solid #304ffe;
  outline-width: 0;
}

button:focus {
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  outline-width: 0;
}

a {
  color: inherit;
  cursor: pointer;
}

.btn-blue {
  background-color: #1a237e;
  width: 150px;
  color: #fff;
  border-radius: 2px;
}

.btn-blue:hover {
  background-color: #000;
  cursor: pointer;
}

.bg-blue {
  color: #fff;
  background-color: #1a237e;
}

@media screen and (max-width: 991px) {
  .logo {
    margin-left: 0px;
  }

  .image {
    width: 600px;
  }

  .border-line {
    border-right: none;
  }

  .card2 {
    border-top: 1px solid #eeeeee !important;
    margin: 0px 15px;
  }
}
</style>
