<template>
  <div>
      <section class="ftco-section">
        <div class="">
            <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><inertia-link href="/dashboard">Dashboard</inertia-link></li>
                        <li class="breadcrumb-item"><inertia-link href="/staffManager">Staff Manager</inertia-link></li>
                        <li class="breadcrumb-item active" aria-current="page">Requisition Manager</li>
                    </ol>
                </nav>
                <div class="wrap d-md-flex">
                     
                    <!-- <div class="img" style="background-image:url(admin_assets/loginImage.webp)"></div> -->
                    <div class="login-wrap p-4 p-md-5 col-md-12">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Add Staff</h3>
                            </div>
                        </div>
                        <form action="" class="signin-form" @submit.prevent="register">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card shadow mb-2 bg-white rounded image-preview image-fluid text-center justify-content-center p-3"  >
                                    <img src="" id="image-preview__image" width=100%  style="z-index:1;"><i style="display:block;" class="fas fa-camera" ></i>
                                    
                                    </div>
                                    <div class="custom-file">
                                    <button class="btn btn-light form-control" type="button" onclick="document.getElementById('inpFile').click();"><strong> Upload</strong></button>
                                        <!-- <input  style="visibility:hidden;" type='file' name='file' id="inpFile" class="form-control" required 
                                        onchange="document.getElementById('image-preview__image').src = window.URL.createObjectURL(this.files[0])" />                   -->
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3 form">
                                            <div class="input-group-prepend form">
                                                <span class="input-group-text bg-light">FUll Name:</span>
                                            </div>
                                            <input type="text" class="form-control form-height" placeholder="Enter Staff Name" required="" v-model="form.fullname"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3 form">
                                            <div class="input-group-prepend form">
                                                <span class="input-group-text bg-light">Email:</span>
                                            </div>
                                            <input type="email" class="form-control form-height" placeholder="Email" required="" v-model="form.email"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3 form">
                                            <div class="input-group-prepend form">
                                                <span class="input-group-text bg-light">Staff ID:</span>
                                            </div>
                                            <input type="text" class="form-control form-height" placeholder="Enter Staff ID" required="" v-model="form.staffID"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3 form">
                                            <div class="input-group-prepend form">
                                                <span class="input-group-text bg-light">Department:</span>
                                            </div>
                                            <select class="custom-select" name="dept_id" id="selectDepartment" required v-model="form.department" >
                                                <option v-for="(d,i) in dep" :key="i" :value='d.id'>{{d.dept}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <div class="input-group-prepend form">
                                                <span class="input-group-text bg-light">Gender:</span>
                                                <select class="custom-select" name="dept_id" id="selectDepartment" required v-model="form.gender">
                                                    <option value='' >Select Gender:</option>
                                                    <option value='male'>Male</option>
                                                    <option value='memale'>Female</option>
                                                    <!-- <option value='Other'>Other</option> -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3 form">
                                            <div class="input-group-prepend form">
                                                <span class="input-group-text bg-light">Date of Birth:</span>
                                            </div>
                                            <input type="date" class="form-control form-height" placeholder="Enter DOB" required="" v-model="form.dob"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3 form">
                                            <div class="input-group-prepend form">
                                                <span class="input-group-text bg-light">Address</span>
                                            </div>
                                            <textarea name="address" id="address" cols="38" class="form-control" 
                                            rows="5" placeholder="" required v-model="form.address" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light">Phone </span>
                                            </div>
                                            <input type="number" name="phone" class="form-control" v-model="form.phone" required />
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light">Qualification</span>
                                            </div>
                                            <input type="text" name="qualification" v-model="form.qualification" class="form-control" required />
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text bg-light">Position</span>
                                            </div>
                                            <select class="custom-select" name="position_id" id="selectposition" required v-model="form.position_id">
                                                <option v-for="(p,i) in pos" :key="i" :value='p.id'>{{p.position}}</option>
                                            </select>
                                        </div>     
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                            
                            <div class="form-group">
                            
                                <button type="submit" class="form-control form-height btn btn-success rounded submit px-3 changeColor" >Create Staff</button>
                            
                            </div>
                       
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
   
  </div>
</template>

<script>
import Layout from './Layouts/Layout.vue'
//   importing layout for pages outside admin folder

export default {
             // Using a render function
    layout: (h, page) => h(Layout, [page]),
    
    components: {
    //   Head,
      Layout,
    },
    props:['pos', 'dep'],
    data () {
        return {
            form : {}
        }
    },
    methods :{
        register(){
            // this.$inertia.visit('/admin')
            //Posting the data asynchronously to the backend with axios using /add_user as my end point
            //You can find where i registered the endpoint in web.php line 56
            axios.post('/add_user', this.form)
            .then(res=>{
                swal('User Added successfully!!!', {
                        icon: "success",
                        });
                
                //cleared the form values after submitting
                this.form = {}
            }).catch(err=>{
                swal('Unable to Add User', {
                        icon: "error",
                        });
            })
        }
    },
    mounted() {
        // console.log(this.pos)
    }
}
</script>

<style scoped>
    .form-height{
        height:48px;
        background:#fff;
        color:#000;
        font-size:16px;
        border-radius:5px;
        -webkit-box-shadow:none;
        box-shadow:none;
        border:1px solid rgba(0,0,0,.1)
    }
    .wrap {
        width: 100%;
        overflow: hidden;
        background: #fff;
        border-radius: 5px;
        -webkit-box-shadow: 0 10px 34px -15px rgb(0 0 0 / 24%);
        -moz-box-shadow: 0 10px 34px -15px rgba(0,0,0,.24);
        box-shadow: 0 10px 34px -15px rgb(0 0 0 / 24%);
    }
</style>