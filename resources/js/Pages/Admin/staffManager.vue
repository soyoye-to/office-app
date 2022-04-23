<template>
    <div>
        <section class="ftco-section">
          <div class="card" >
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><inertia-link href="/dashboard">Dashboard</inertia-link></li>
                        <li class="breadcrumb-item active" aria-current="page">Staff Manager</li>
                    </ol>
                </nav>
                <!-- List DataTable -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card invoice-list-wrapper">
                                <div class="card-datatable table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row d-flex justify-content-between align-items-center m-1">
                                            <div class="col-lg-6 d-flex align-items-center">
                                                <div class="dropdown float-right">
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fas fa-th" style="font-size:14px;"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="statuschange" value="">
                                                            <inertia-link href="/register">Add new staff</inertia-link>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pr-lg-1 p-0">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    <label>
                                                        <input type="search" class="form-control" placeholder="Search Invoice" aria-controls="DataTables_Table_0">
                                                    </label>
                                                </div>
                                                <div class="invoice_status ml-sm-2">
                                                </div>
                                            </div>
                                        </div>
                                    <table class="invoice-list-table table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="control sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="display: none;"></th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="#: activate to sort column ascending" style="width:30px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width:60px;">Image</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending">Full Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Total: activate to sort column ascending">Department</th>
                                                <th class="text-truncate sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Issued Date: activate to sort column ascending">Position</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">Phone No</th>
                                                <th class="cell-fit sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd" v-for="(staff, index) in staffs.data" :key="index">
                                                <td valign="top" class="dataTables_empty">{{index+1}}</td>
                                                <td >
                                                    <a :href="('/images/Profile/' + staff.profile_pic)" data-lightbox="photos" target="blank">
                                                        <img class="image-fluid" width="50px" height="50px" style="border-radius:50%;" :src="('/images/Profile/' + staff.profile_pic)" alt="Image" data-lightbox="photos">
                                                    </a>
                                                </td>
                                                <td >{{staff.name}}</td>
                                                <td >{{staff.dept}}</td>
                                                <td >{{staff.position}}</td>
                                                <td >{{staff.phone}}</td>
                                                <td >
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fas fa-th" style="font-size:14px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="statuschange" value="">
                                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editStaffModal"  @click="SetEditStaff(staff)"  >Edit</a>
                                                                <a href="#" class="dropdown-item" @click="DeleteStaff(staff.id, staff.name);">Delete</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <pagination :data="staffs" @pagination-change-page="getStaff"></pagination>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ List DataTable -->
            </div>
                        <!-- <===========================   EDIT PAYMENT HEAD MODAL ========================================> -->
            <div class="modal fade" id="editStaffModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form class="form-horizontal form-material mx-2" @submit.prevent="updateStaff" enctype="multipart/form-data">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label id="basic-addo">Full Name: </label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control mb-2" placeholder="Enter Full Name" 
                                                            v-model="Edit_Staff.name" aria-describedby="basic-addo"  >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label id="basic-addon">Phone Number: </label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="tel" class="form-control mb-2" placeholder="Enter Phone Number" 
                                                            v-model="Edit_Staff.phone" aria-describedby="basic-addon"  >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label id="basic-addon3">Department: </label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="custom-select mb-2" name="deparment_id" id="selectdepartment" 
                                                            v-model="Edit_Staff.dept_id">
                                                                <option v-for="(dept,index) in departments" :key="index" :value='dept.id'>{{dept.dept}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label id="basic-addon3">Position: </label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="custom-select mb-2" name="position_id" id="selectposition"  
                                                            v-model="Edit_Staff.pos_id">
                                                                <option v-for="(position,index) in positions" :key="index" :value='position.id'>{{position.position}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </section>
    </div>
</template>
<script>
import Layout from '../Layouts/Layout.vue'
//   importing layout for pages outside admin folder

export default {
// Using a render function
    layout: (h, page) => h(Layout, [page]),
    
    components: {
    //   Head,
      Layout,
    },
    //Passing data from the controller
    props:['user','positions', 'departments'],
    data(){
        return {
                staffs : {data:[]},
                Edit_Staff:{},  
            }
    },
    methods:{
        //recieving Users from database
        getStaff(page = 1) {
            // console.log('I am working');
            axios.get('get_staff?page=' + page).then(res => {
                // passingdata from the database to the staff variable
                this.staffs = res.data.staffs
                // console.log(this.staffs);
            }).catch(err => {
            swal("Cannot fetch Staff!!!", {
                icon: "error",
                });
            })
            
        },
        //deleting Titles
        DeleteStaff(id,  name) {
            // console.log(id)
            swal({
                title: "Delete this Staff Record?",
                // text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    axios.delete(`deleteStaff/${id}`)
                    .then((res) => {
                        swal("Staff Record deleted Successfully!!!", {
                        icon: "success",
                        });
                        this.getStaff()
                    }).catch(err => console.log(err.data))
                
                } else {
                    swal("Canceled!!!");
                }
            });
        },
        //edit staff
        SetEditStaff(staffDetails){
            this.Edit_Staff = staffDetails; 
            // console.log(this.Edit_Staff)
        },
        updateStaff(){
                let edited_staffData = this.Edit_Staff;
                // console.log(edited_staffData);
                axios.post('edit-staff', edited_staffData)
                .then(res => {
                    swal("Staff Details Edited!!!", {
                        icon: "success",
                    });
                $('#editStaffModal').modal('hide');
                this.formLoad= true
                this.getStaff();
                
                }).catch( err => {
                    console.log(error)
                // swal("Unable to  Edit Staff Details", {
                //     icon: "error",
                //     });
                })
                // this.getStaff();
        }
    },
     mounted() {
            this.getStaff()
            // console.log(this.positions)
            // console.log(this.departments)
        }

}
</script>
<style scoped>

</style>
