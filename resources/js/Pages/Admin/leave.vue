<template>
    <div>
        <section class="ftco-section">
          <div class="card" >
            <div class="card-body">
                <!-- List DataTable -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card invoice-list-wrapper">
                                <div class="card-datatable table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row d-flex justify-content-between align-items-center m-1">
                                           <div v-if="(userType == 'user')||(userType == 'admin') ">
                                                <div class="col-lg-6 d-flex align-items-center">
                                                    <div class="dropdown float-right">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fas fa-th" style="font-size:14px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="statuschange" value="">
                                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#apply4Leave" >Apply for Leave</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-if="userType != 'user'" class="col-lg-3 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pr-lg-1 p-0">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    <label>
                                                        <input type="text" v-model="filters.name" @keyup="getApplicants()" class="form-control" placeholder="Search Name" aria-controls="DataTables_Table_0">
                                                    </label>
                                                </div>
                                                <div class="invoice_status ml-sm-2">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pr-lg-1 p-0">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    <label>
                                                        <input type="text" v-model="filters.purpose" @keyup="getApplicants()" class="form-control" placeholder="Search Title" aria-controls="DataTables_Table_0">
                                                    </label>
                                                </div>
                                                <div class="invoice_status ml-sm-2">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pr-lg-1 p-0">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    <label>
                                                        <input type="date" v-model="filters.date" @change="getApplicants()" class="form-control"  aria-controls="DataTables_Table_0">
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
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Total: activate to sort column ascending">Purpose</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Total: activate to sort column ascending">Beginnig</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Total: activate to sort column ascending">Ending</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Total: activate to sort column ascending" >Status</th>
                                                <th class="text-truncate sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Issued Date: activate to sort column ascending" style="width:40px;!important">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd" v-for="(leave, index) in leaveList" :key="index">
                                                <td valign="top" class="dataTables_empty">{{index+1}}</td>
                                                <td >{{leave.staffName}}</td>
                                                <td >{{leave.Purpose}}</td>
                                                <td >{{leave.reason}}</td>
                                                <td >{{leave.time_from}}</td>
                                                <td >{{leave.time_to}}</td>
                                                <td v-if="leave.status == 'pending'"
                                                    class='badge badge-pill badge-warning mt-1' >{{leave.status}}
                                                    </td>
                                                    <td v-else-if="leave.status == 'approved'"
                                                    class='badge badge-pill badge-success mt-1'>{{leave.status}}</td>
                                                    <td v-else-if="leave.status == 'declined'"
                                                    class='badge badge-pill badge-danger mt-1'>{{leave.status}}</td>
                                                <td >
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fas fa-th" style="font-size:14px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="statuschange" value="">
                                                                <div v-if="(leave.status != 'approved') && (leave.status != 'declined')">
                                                                    <div v-if="(userType == 'user')||(userType == 'admin')">
                                                                        <a href="#" class="dropdown-item" data-toggle="modal"  @click="SetEditContent(leave)" data-target="#editLeaveApplication" >Edit Application</a>
                                                                        <a href="#" class="dropdown-item" data-toggle="modal" @click="Deleteleave(leave.id);">Delete Application</a>
                                                                    </div>
                                                                </div>
                                                                <div v-if="userType == 'superadmin'">
                                                                    <a href="#" class="dropdown-item" @click="approveLeave(leave.id)" >Approve</a>
                                                                    <a href="#" class="dropdown-item" @click="rejectLeave(leave.id)" >Decline</a>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                        <!-- <div class="d-flex justify-content-between mx-2 row"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">&nbsp;</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">&nbsp;</a></li></ul></div></div></div></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ List DataTable -->
            </div>
              <!-- <==========================  Apply for Leave MODAL  ===================================> -->
            <!-- Modal -->
                <div class="modal fade" id="apply4Leave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form class="form-horizontal form-material mx-2" @submit.prevent="createLeave" enctype="multipart/form-data">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <!-- <h5 class="modal-title" id="exampleModalLabel">Add Payment Head</h5> -->
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
                                                        <label id="basic-addon3">Title: </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control mb-0" placeholder="Enter Title" aria-describedby="basic-addon3" v-model="form.lTitle">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="mt-2">Prupose: </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control " aria-label="With textarea" v-model="form.lPurpose"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="container">
                                                <div class="row mt-2">
                                                    <div class="col-md-2 ">
                                                        <label class="mb-2" for="inputGroupSelect01">From: </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="date" class="form-control mb-0" aria-describedby="basic-addon3" v-model="form.dateFrom">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="mt-2" for="inputGroupSelect01">To: </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="date" class="form-control mb-0" aria-describedby="basic-addon3" v-model="form.dateTo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Apply</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <===========================   EDIT PAYMENT HEAD MODAL ========================================> -->
            <div class="modal fade" id="editLeaveApplication" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form class="form-horizontal form-material mx-2" @submit.prevent="editApplication" enctype="multipart/form-data">
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
                                                    <label id="basic-addon3">Title: </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control mb-0" placeholder="Enter Title" aria-describedby="basic-addon3" v-model="Edit_Content.Purpose">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="mt-2">Prupose: </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea class="form-control " aria-label="With textarea" v-model="Edit_Content.reason"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="container">
                                            <div class="row mt-2">
                                                <div class="col-md-2 ">
                                                    <label class="mb-2" for="inputGroupSelect01">From: </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="date" class="form-control mb-0" aria-describedby="basic-addon3" v-model="Edit_Content.time_from">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="mt-2" for="inputGroupSelect01">To: </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="date" class="form-control mb-0" aria-describedby="basic-addon3" v-model="Edit_Content.time_to">
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
        props:['reqTitle'],
        data () {
            return {
                form : {},
                leaveList : {data:[]},
                lPurpose:"",
                lTitle:"",
                dateFrom:"",
                dateTo:"",
                Edit_Content : '',
                userType:this.$page.props.auth.user.type,
                filters:{},
               
            }
        },
        methods :{
            createLeave(){
                axios.post('add_leave', this.form)
                .then(res=>{
                    swal('Application Successful!!!', {
                            icon: "success",
                            });
                $('#apply4Leave').modal('hide');
                }).catch(err=>{
                    swal('Application Unsuccessful', {
                            icon: "error",
                            });
                })
                //clearing form after submission
                this.form = '';
                //refreshing the component to bring lately added daa
                this.getApplicants()
            },
            getApplicants(page=1) {
                axios.post('get_leave_applicants?page='+page, {filters:this.filters}).then(res => {
                this.leaveList = res.data.apllicantList
                }).catch(err => {
                swal("Cannot fetch Leave Applicants!!!", {
                    icon: "error",
                    });
                })
                
            },
            //deleting Titles
            Deleteleave(id,  name) {
                swal({
                    title: "Delete this Leave Application?",
                    // text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        axios.delete(`deleteLeave/${id}`)
                        .then((res) => {
                            swal("Leave Application deleted Successfully!!!", {
                            icon: "success",
                            });
                            this.getApplicants()
                        }).catch(err => console.log(err.data))
                    
                    } else {
                        swal("Canceled!!!");
                    }
                });
            },
            SetEditContent(details){
                this.Edit_Content = details; 
            },
            editApplication(){
                let edited_data = this.Edit_Content;
                axios.post('edit-application', edited_data)
                .then(res => {
                    swal("Application Edited!!!", {
                        icon: "success",
                    });
                $('#editLeaveApplication').modal('hide');
                this.getApplicants();
                
                }).catch( err => {
                    // console.log(error)
                swal("Unable to  Edit Application", {
                    icon: "error",
                    });
                })
            },
            approveLeave(id){
                swal({
                    title: "Approve Leave Application?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willApprove) => {
                    if (willApprove) {
                        axios.post(`approveLeave/${id}`)
                        // console.log(approve, id)
                        .then((res) => {
                            swal("Leave Application Approved!!!", {
                            icon: "success",
                            });
                            this.getApplicants()
                        }).catch(err => console.log(err.data))
                    
                    } else {
                        swal("Canceled!!!");
                    }
                });
            },
            rejectLeave(id){
                swal({
                    title: "Decline Leave Application?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willApprove) => {
                    if (willApprove) {
                        axios.post(`rejectLeave/${id}`)
                        .then((res) => {
                            swal("Leave Application Rejected!!!", {
                            icon: "success",
                            });
                            this.getApplicants()
                        }).catch(err => console.log(err.data))
                    
                    } else {
                        swal("Canceled!!!");
                    }
                });
            }
        },
        mounted() {
            this.getApplicants();
            console.log(this.userType);

        }

    }
</script>
<style scoped>

</style>
