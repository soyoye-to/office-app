<template>
    <div>
        <section class="ftco-section">
          <div class="card" >
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><inertia-link href="/dashboard">Dashboard</inertia-link></li>
                        <li class="breadcrumb-item active" aria-current="page">Position Manager</li>
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
                                                <a href="#" data-toggle="modal" data-target="#addPosMOdal"  class="dropdown-item">Add New Position</a>
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
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending">Position</th>
                                                    <th class="cell-fit sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd" v-for="(detail, index) in staffList" :key="index">
                                                    <td valign="top" class="dataTables_empty">{{index+1}}</td>
                                                    <td >{{detail.name}}</td>
                                                    <td >{{detail.position}}</td>
                                                    <!-- <td >{{}}</td> -->
                                                    <td >
                                                        <div class="dropdown">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fas fa-th" style="font-size:14px;"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="statuschange" value="">
                                                                    <a href="#" class="dropdown-item" data-toggle="modal"  @click="SetEditContent(detail)" data-target="#allocatePositionModal" >Allocate Dept</a>
                                                                    <a href="#" class="dropdown-item" data-toggle="modal" @click="positionHistory(detail.id)" data-target="#DeptHistoryMOdal">History</a>
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
            <!-- <==========================  ADD Position MODAL  ===================================> -->
            <!-- Modal -->
                <div class="modal fade" id="addPosMOdal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form class="form-horizontal form-material mx-2" @submit.prevent="add_position" enctype="multipart/form-data">
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
                                                                <label class="mt-1">Position Title: </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" class="form-control mb-0" placeholder="Enter Name of Representative" 
                                                                aria-describedby="basic-addon3" v-model="form.position_name"  >
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

            <!-- <==========================  Allocate Position MODAL  ===================================> -->
            <!-- Modal -->
            <div class="modal fade" id="allocatePositionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form class="form-horizontal form-material mx-2" @submit.prevent="allocatePosition" enctype="multipart/form-data">
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
                                                            <select class="custom-select" name="deparment_id" id="selectdept" required v-model="Edit_Content.pos_id" >
                                                                <option>Change Department</option>
                                                                <option v-for="(position,index) in all_positions" :key="index" :value='position.id'>{{position.position}}</option>
                                                            </select>
                                                            <!-- <input type="text" class="form-control mb-0" disabled 
                                                            aria-describedby="basic-addon3" v-model="Edit_Content.position"  > -->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label class="mt-1">Change to: </label>
                                                        </div>
                                                        <select class="custom-select" name="deparment_id" id="selectdepartment" required v-model="Edit_Content.staffnewPost" >
                                                            <option>Change Department</option>
                                                            <option v-for="(position,index) in all_positions" :key="index" :value='position.id'>{{position.position}}</option>
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

            <!-- <==========================  Position History MODAL  ===================================> -->
            <!-- Modal -->
                <div class="modal fade" id="DeptHistoryMOdal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form class="form-horizontal form-material mx-2"  enctype="multipart/form-data">
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
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending">Previous Position</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending">New Position</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd" v-for="(positionHistory, index) in PositionHistories" :key="index">
                                                <td valign="top" class="dataTables_empty">{{index+1}}</td>
                                                <td >{{positionHistory.previous_pos}}</td>
                                                <td >{{positionHistory.new_position}}</td>
                                                <td >{{positionHistory.created_at}}</td>
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
    props:['all_positions'],
   
    data(){
        return {
            form:{},
            staffList: [],
            PositionHistories:[],
            Edit_Content:'',
            staffnewPos:''
        }
    },
    methods:{
        add_position(){
             axios.post('add_new_pos', this.form)
                .then(res=>{
                    swal('Position Added successfully!!!', {
                            icon: "success",
                            });
                $('#addPosMOdal').modal('hide');
                }).catch(err=>{
                    swal('Unable to Add Position!!!', {
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
            axios.get('get_staffList_For_Position').then(res => {
            this.staffList = res.data.staffListForPosition
                console.log(this.staffList);
            }).catch(err => {
            swal("Cannot Fetch List!!!", {
                icon: "error",
                });
            })
            
        },
        SetEditContent(details){
            this.Edit_Content = details; 
        },
        allocatePosition(){
            let edited_data = this.Edit_Content;
            axios.post('allocate-pos', edited_data)
            .then(res => {
                swal("Position Changed successfully!!!", {
                    icon: "success",
                });
            $('#allocatePositionModal').modal('hide');
            this.getStaff();
            
            }).catch( err => {
                console.log(error)
            })
        },
        positionHistory(id){
            axios.get(`position_History/${id}`).then(res => {
            this.PositionHistories = res.data.PositionHistoriess
                console.log(this.PositionHistories);
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
