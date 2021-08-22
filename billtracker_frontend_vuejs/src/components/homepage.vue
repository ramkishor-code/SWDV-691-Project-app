<script>

// import  '../assets/landingpage/js/scripts.js'
// import  '../assets/landingpage/js/latest.js'

    
import axios from 'axios'
import configs from "../services/config"

export default {
    data(){
        return {
          email:null
        }
       
    },
     async  mounted(){
        
     },
     methods:{
        
        async savemail(){
             if(this.email===null){
  this.$toast.open({
            message: "Please Enter a valid email id",
            type: "error",
            position: "top",
          });
         }else if(!this.email.match('@')){


        this.$toast.open({
            message: "Please Enter a valid email id",
            type: "error",
            position: "top",
          }); 
             }else{
 const response = await axios.get(
            configs.appurl + "/subscriber/"+this.email
          )
          console.log(response.data)
            this.$toast.open({
            message: "Email id saved successfully",
            type: "success",
            position: "top",
          });
         }
             
          
          
         }
     }
   
}
</script>
<style scoped>

  @import '../assets/landingpage/css/styleslo.css';
</style>
<template>
      <div id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top"> <img src="../assets/logo.png" alt="" width="200" ></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects">Concept</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                         <li class="nav-item"><router-link class="nav-link" to="/login">Sign-In</router-link></li>
                          <li class="nav-item"><router-link class="nav-link" to="/register">Register</router-link></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Bill tracker</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">No time for surprises?
                                 Use our bills and subscription tracker </h2>
                        <a class="btn btn-dark text-light" @click="$router.push('/register')">Get Started</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Bill tracker</h2>
                        <p class="text-white-50">
                            Know what you’re paying and when. Get notified before they’re due.
                        </p>
                    </div>
                </div>
                 <img class="img-fluid" src="../assets/landingpage/assets/img/ipad.png" style="width:500px" alt="..." />
            </div>
        </section>
        <!-- Projects-->
        <section class="projects-section " id="projects">
            <div class="container px-4 px-lg-5">
                <!-- Featured Project Row-->
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="../assets/img1.png" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-white text-center text-lg-left">
                            <h4>Dashboard</h4>
                            <p class="text-white-50 mb-0">
                                Bill tracker application is a unique product which helps the financial stability Managment
                        </p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="../assets/img2.png" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Manage Your Bills</h4>
                                    <p class="mb-0 text-white-50">You Are One Step Away To Manage Yours Bills.Just Register And logon To Experience The Difference From Other Bill Managers Applications</p>
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- project two -->
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="../assets/img3.png" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Billing Calendar Events Viewer</h4>
                                    <p class="mb-0 text-white-50">This Event Viewer Bring Together All The Billing Dates For The Month, Makes it convenient to visually Analyse Data</p>
                                    <hr class="d-none d-lg-block mb-0 me-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- Project Two three-->
                   <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="../assets/img4.png" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Billing Reports</h4>
                                    <p class="mb-0 text-white-50">Billtracker Billing Reports Are Very Essencial Feature As Reports Gives A Clear Understanding Of The Data </p>
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                
                
            </div>
        </section>
        <!-- Signup-->
        <section class="signup-section" id="signup">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Provide Your For Contact!</h2>
                 
                        <form class="form-signup" id="contactForm" @submit.stop.prevent="onSubmit" >
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col"><input class="form-control" id="emailAddress" v-model="email" type="email" placeholder="Enter email address..." aria-label="Enter email address..." data-sb-validations="required,email" /></div>
                                <div class="col-auto"><button class="btn btn-primary"  @click="savemail()" id="submitButton" type="submit" >Contact Me!</button></div>
                            </div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">An email is required.</div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email is not valid.</div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3 mt-2 text-white">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href=""></a>
                                </div>
                            </div>
                
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2">Error sending message!</div></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">4923 Imaginary Street, San Francisco CA</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">Team@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+1 (555) 902-8832</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Bill tracker 2021</div></footer>
  
    </div>
</template>


