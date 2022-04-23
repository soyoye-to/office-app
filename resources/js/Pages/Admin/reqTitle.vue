<template>
    <div>
        <section class="ftco-section">
          <div class="card" >
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><inertia-link href="/dashboard">Dashboard</inertia-link></li>
                        <li v-if="user_type == 'superadmin'" class="breadcrumb-item"><inertia-link href="/reqTitle">Add Payment Head</inertia-link></li>
                        <li v-if="user_type == 'superadmin'" class="breadcrumb-item"><inertia-link href="/account_statement">Account Statement</inertia-link></li>
                        <li v-if="user_type == 'superadmin'" class="breadcrumb-item"><inertia-link href="/requisition_analytics">Analytics</inertia-link></li>
                        <li class="breadcrumb-item active" aria-current="page">Requisition Manager</li>
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
                                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#paymentHeadModal" >Add new Payment Head</a>
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
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending">Payment Head</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending">Payment Head Description</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Total: activate to sort column ascending">Type</th>
                                                <th class="text-truncate sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Issued Date: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd" v-for="(payHead, index) in payHeads" :key="index">
                                                <td valign="top" class="dataTables_empty">{{index+1}}</td>
                                                <td >{{payHead.req_title}}</td>
                                                <td >{{payHead.req_desc}}</td>
                                                <td >{{payHead.type}}</td>
                                                <td >
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fas fa-th" style="font-size:14px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="statuschange" value="">
                                                                <a href="#" class="dropdown-item" data-toggle="modal"  @click="SetEditContent(payHead)" data-target="#editPaymentHeadModal" >Edit</a>
                                                                <a href="#" class="dropdown-item" data-toggle="modal" @click="DeletePayHead(payHead.id , payHead.req_title);">Delete</a>
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
              <!-- <==========================  ADD PAYMENT HEAD MODAL  ===================================> -->
            <!-- Modal -->
                <div class="modal fade" id="paymentHeadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form class="form-horizontal form-material mx-2" @submit.prevent="createPhead" enctype="multipart/form-data">
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
                                                                <label id="basic-addon3">Payment Head: </label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control mb-0" placeholder="Enter Payment Head" aria-describedby="basic-addon3" v-model="form.pHead">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label class="mt-2">Description: </label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea class="form-control " aria-label="With textarea" v-model="form.description"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-1">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label class="mt-2" for="inputGroupSelect01">Type: </label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <select class="custom-select mt-2" id="inputGroupSelect01" v-model="form.statusType">
                                                                    <option value="Credit">Credit</option>
                                                                    <option value="Debit">Debit</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                <!-- v-model="user.password" -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <===========================   EDIT PAYMENT HEAD MODAL ========================================> -->
            <div class="modal fade" id="editPaymentHeadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form class="form-horizontal form-material mx-2" @submit.prevent="editPhead" enctype="multipart/form-data">
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
                                                            <label id="basic-addon3">Payment Head: </label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control mb-0" placeholder="Enter Payment Head" 
                                                            aria-describedby="basic-addon3" v-model="Edit_Content.req_title" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label class="mt-2">Description: </label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control " aria-label="With textarea" v-model="Edit_Content.req_desc"  ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-1">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label class="mt-2" for="inputGroupSelect02">Type: </label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="custom-select mt-2" id="inputGroupSelect02" v-model="Edit_Content.type">
                                                                <option value="Credit">Credit</option>
                                                                <option value="Debit">Debit</option>
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
        props:['reqTitle'],
        data () {
            return {
                form : {},
                payHeads : [],
                pHead:"",
                pDesc:"",
                pType:"",
                Edit_Content : '',
                user_type:this.$page.props.auth.user.type,
               
            }
        },
        methods :{
            createPhead(){
                // console.log(this.form) 
                axios.post('add_reqTitle', this.form)
                .then(res=>{
                    swal('Payment Head Added successfully!!!', {
                            icon: "success",
                            });
                $('#paymentHeadModal').modal('hide');
                }).catch(err=>{
                    swal('Unable to Add Payment Head!!!', {
                            icon: "error",
                            });
                })
                //clearing form after submission
                this.form = '';
                //refreshing the component to bring lately added daa
                this.getreqTitle()
            },
            //recieving tiltes from database
            getreqTitle() {
                // console.log('I am working');
                axios.get('get_reqTitle').then(res => {
                this.payHeads = res.data.payHeads
                    // console.log(this.payHeads);
                }).catch(err => {
                swal("Cannot fetch Requistion Title!!!", {
                    icon: "error",
                    });
                })
                
            },
            //deleting Titles
            DeletePayHead(id,  name) {
                swal({
                    title: "Delete this Payment Head?",
                    // text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        axios.delete(`deletePayHead/${id}`)
                        .then((res) => {
                            swal("Payment Head deleted Successfully!!!", {
                            icon: "success",
                            });
                            this.getreqTitle()
                        }).catch(err => console.log(err.data))
                    
                    } else {
                        swal("Canceled!!!");
                    }
                });
            },
            //Passing the data to the edit modal Titles
            SetEditContent(details){
                this.Edit_Content = details; 
            },
           // Editing The Data
            editPhead(){
                let edited_data = this.Edit_Content;
                axios.post('edit-reqTitle', edited_data)
                .then(res => {
                    swal("Requisition Title Edited!!!", {
                        icon: "success",
                    });
                $('#editPaymentHeadModal').modal('hide');
                this.getreqTitle();
                
                }).catch( err => {
                    console.log(error)
                // swal("Unable to  Edit Requisition Title", {
                //     icon: "error",
                //     });
                })
            }
        },
        mounted() {
            this.getreqTitle()
        }

    }
</script>
<style scoped>

</style>
