<template>
    <div>
        <section class="ftco-section">
          <div class="card" >
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><inertia-link href="/dashboard">Dashboard</inertia-link></li>
                        <li class="breadcrumb-item active" aria-current="page">Department Manager</li>
                    </ol>
                </nav>
                <!-- List DataTable -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card invoice-list-wrapper ">
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="dropdown float-right">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-th" style="font-size:14px;"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="" method="POST">
                                                <input type="hidden" name="statuschange" value="">
                                                <a href="#" data-toggle="modal" data-target="#addDeptMOdal"  class="dropdown-item">Add New Department</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="table-responsive">
                                        <table class="invoice-list-table table table-sm dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="control sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="display: none;"></th>
                                                    <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="#: activate to sort column ascending" style="width:30px;">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending">Staff Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending">Department</th>
                                                    <th class="cell-fit sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd" v-for="(detail, index) in staffList" :key="index">
                                                    <td valign="top" class="dataTables_empty">{{index+1}}</td>
                                                    <td >{{detail.name}}</td>
                                                    <td >{{detail.dept}}</td>
                                                    <!-- <td >{{}}</td> -->
                                                    <td >
                                                        <div class="dropdown">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fas fa-th" style="font-size:14px;"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="statuschange" value="">
                                                                    <a href="#" class="dropdown-item" data-toggle="modal"  @click="SetEditContent(detail)" data-target="#allocateDepartmentModal" >Allocate Dept</a>
                                                                    <a href="#" class="dropdown-item" data-toggle="modal" @click="departmentHistory(detail.id)" data-target="#DeptHistoryMOdal">History</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- <==========================  Allocate Department MODAL  ===================================> -->
            <!-- Modal -->
                <div class="modal fade" id="allocateDepartmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form class="form-horizontal form-material mx-2" @submit.prevent="allocate" enctype="multipart/form-data">
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
                                                <div class="input-group">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="mt-1">Change from: </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <select class="custom-select" name="deparment_id" id="selectdept" required v-model="Edit_Content.dept_id" >
                                                                    <option>Change Department</option>
                                                                    <option v-for="(dept,index) in depts" :key="index" :value='dept.id'>{{dept.dept}}</option>
                                                                </select>
                                                                <!-- <input type="text" class="form-control mb-0" disabled 
                                                                aria-describedby="basic-addon3" v-model="Edit_Content.dept"  > -->
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="mt-1">Change to: </label>
                                                            </div>
                                                            <select class="custom-select" name="deparment_id" id="selectdepartment" required v-model="Edit_Content.staffnewDept" >
                                                                <option>Change Department</option>
                                                                <option v-for="(dept,index) in depts" :key="index" :value='dept.id'>{{dept.dept}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Change</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- <==========================  Add Department MODAL  ===================================> -->
            <!-- Modal -->
                <div class="modal fade" id="addDeptMOdal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form class="form-horizontal form-material mx-2" @submit.prevent="add_dept" enctype="multipart/form-data">
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
                                                <div class="input-group">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="mt-1">Add department: </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" class="form-control mb-0"  placeholder="Enter Department name"
                                                                aria-describedby="basic-addon3" v-model="form.department_name"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>

             <!-- <==========================  Department History MODAL  ===================================> -->
            <!-- Modal -->
                <div class="modal fade" id="DeptHistoryMOdal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form class="form-horizontal form-material mx-2" enctype="multipart/form-data">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                        <table class="invoice-list-table table table-sm dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="control sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="display: none;"></th>
                                                    <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="#: activate to sort column ascending" style="width:30px;">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending">Previous Department</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending">New Department</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd" v-for="(deptHist, index) in newDepts" :key="index">
                                                <td valign="top" class="dataTables_empty">{{index+1}}</td>
                                                <td >{{deptHist.previous_dept}}</td>
                                                <td >{{deptHist.new_department}}</td>
                                                <td >{{deptHist.created_at}}</td>
                                                <!-- <td >{{}}</td> -->
                                                
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
    props:['depts','newDepts'],
   
    data(){
        return {
            form:{},
            staffList:[],
            Edit_Content:'',
            staffnewDept:''
        }
    },
    methods:{
        add_dept(){
             axios.post('add_new_dept', this.form)
                .then(res=>{
                    swal('Department Added successfully!!!', {
                            icon: "success",
                            });
                $('#addDeptMOdal').modal('hide');
                }).catch(err=>{
                    swal('Unable to Add Department!!!', {
                            icon: "error",
                            });
                })
                //clearing form after submission
                this.form = '';
                //refreshing the component to bring lately added daa
                this.getStaff()
        },
        getStaff() {
                // console.log('I am working');
                axios.get('get_staffList').then(res => {
                this.staffList = res.data.staffList
                    console.log(this.staffList);
                }).catch(err => {
                swal("Cannot Fetch List!!!", {
                    icon: "error",
                    });
                })
                
            },
        SetEditContent(details){
            this.Edit_Content = details; 
            // console.log(this.Edit_Content)
        },
        allocate(){
            let edited_data = this.Edit_Content;
            axios.post('allocate-dept', edited_data)
            .then(res => {
                swal("Department Changed successfully!!!", {
                    icon: "success",
                });
            $('#allocateDepartmentModal').modal('hide');
            this.getStaff();
            
            }).catch( err => {
                console.log(error)
            })
        },
        departmentHistory(id){
            axios.get(`department_History/${id}`).then(res => {
            this.newDepts = res.data.newDepts
                // console.log(this.PositionHistories);
            }).catch(err => {
            swal("Cannot Fetch History!!!", {
                icon: "error",
                });
            })
        }
    },
     mounted() {
          this.getStaff()
        // console.log(this.requisitionTitles)
    }

}
</script>
<style scoped>
    .curve{
        border-radius: 20px 0 0 20px;
    }
    .curved{
        border-radius: 0 20px 20px 0;
    }
    .ash{
        background-color: rgba(192, 190, 190, 0.61);
    }
</style>
