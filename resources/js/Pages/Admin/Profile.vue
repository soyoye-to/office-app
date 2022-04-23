<template>
    <layout>
    <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <!-- Row -->
          <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
              <div class="card">
                <div class="card-body profile-card">
                  <center class="mt-4">
                    <img :src="(preview) ? preview : (user.profile_pic) ? '/images/Profile/' + user.profile_pic : dummy_pics" class="rounded-circle" width="150" height="150">
                    <h4 class="card-title mt-2">{{user.name}}</h4>
                    <h6 class="card-subtitle">{{user.type}}</h6>
                    <!-- <div class="row justify-content-center">
                      <div class="col-4">
                        <a href="javascript:void(0)" class="link">
                          <i class="mdi mdi-account-network" aria-hidden="true"></i>
                          <span class="font-normal">{{user_posts}}</span>
                        </a>
                      </div>
                      <div class="col-4">
                        <a href="javascript:void(0)" class="link">
                          <i class="mdi mdi-eye" aria-hidden="true"></i>
                          <span class="font-normal">{{user_views}}</span>
                        </a>
                      </div>
                    </div> -->
                  </center>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
              <div class="card">
                <div class="card-body">
                  <form class="form-horizontal form-material mx-2" @submit.prevent="updateProfile" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-md-12 mb-1">Change profile pic</label>
                      <div class="col-md-12">
                        <input type="file" @change="handleImage"  class="form-control ps-0 form-control-line">
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="col-md-12 mb-0">Full Name</label>
                              <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe" class="form-control ps-0 form-control-line" v-model="user.name">
                              </div>
                          </div>
                        </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                              <input type="email" placeholder="" v-model="user.email" class="form-control ps-0 form-control-line" name="example-email" id="example-email">
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="col-md-12 mb-0">Phone Number</label>
                              <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe" class="form-control ps-0 form-control-line" v-model="user.phone">
                              </div>
                          </div>
                        </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-email" class="col-md-12">Qualification</label>
                            <div class="col-md-12">
                              <input type="text" placeholder="" v-model="user.qualification" class="form-control ps-0 form-control-line" name="example-email" id="example-email">
                            </div>
                          </div>
                      </div>
                    </div>
                    
                    
                    <!-- <div class="form-group">
                      <label class="col-md-12 mb-0">Password</label>
                      <div class="col-md-12">
                        <input type="password" v-model="user.password" class="form-control ps-0 form-control-line">
                      </div>
                    </div> -->
                    
                    <div class="form-group">
                      <div class="col-sm-12 d-flex">
                        <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">
                          Update Profile
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Column -->
          </div>
          <!-- Row -->
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        </layout>
</template>
<script>
import layout from "../Layouts/Layout.vue"

export default {
    components: {
        layout,
    }, 
     data() {
        return {
          img_status: false,
          dummy_pics: 'data:image/png;base64,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',
            user: {},
            preview: '',
        }
    },
    methods: {
      getProfile() {
        axios.get('/get-profile').then(res => {
          this.user = res.data.user
        }).catch(err => {
          swal("Cannot fetch profile data !", {
              icon: "error",
            });
        })
      },
      updateProfile() {
        // return console.log(this.user.new_image)
        let form_data = new FormData;
        form_data.append('id', this.user.id)
        form_data.append('name', this.user.name)
        form_data.append('email', this.user.email)
        form_data.append('profile_pic', this.user.profile_pic)
        form_data.append('qualification', this.user.qualification)
        form_data.append('phone', this.user.phone)
        form_data.append('new_image', this.user.new_image)
        axios.post('/update-profile', form_data)
        .then(res => {
          this.getProfile();
           swal("Profile updated !", {
               icon: "success",
             });
        }).catch( err => {
           swal("Unable to  update profile, please try again later !", {
               icon: "error",
             });
        })
      },
      handleImage(e) {
          const file = e.target.files[0];
          this.user.new_image = file;
          this.preview = URL.createObjectURL(file);
          this.img_status = true
      },
    },
    mounted() {
      this.getProfile()
    }
}
</script>
