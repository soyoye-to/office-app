<template>
    <div>
        <section class="ftco-section">
          <div class="card" >
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><inertia-link href="/dashboard">Dashboard</inertia-link></li>
                        <li class="breadcrumb-item active" aria-current="page">Vendor Manager</li>
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
                                                            <a href="#" data-toggle="modal" data-target="#vendorModal"  class="dropdown-item">Add Vendor</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pr-lg-1 p-0">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    <label>
                                                        <input type="search" class="form-control" placeholder="Search Requisition" aria-controls="DataTables_Table_0">
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
                                                <!-- <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width:60px;">Date</th> -->
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client: activate to sort column ascending">Full Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  aria-label="Total: activate to sort column ascending">Company Name</th>
                                                <th class="text-truncate sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Issued Date: activate to sort column ascending">Phone No</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">Purpose</th>
                                                <th class="cell-fit sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">Actions</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                            <tr class="odd" v-for="(vendor, index) in vendorList" :key="index">
                                                <td valign="top" class="dataTables_empty">{{index+1}}</td>
                                                <td >{{vendor.rep_name}}</td>
                                                <td >{{vendor.org_name}}</td>
                                                <td >{{vendor.phone_no}}</td>
                                                <td >{{vendor.duty}}</td>
                                                <td >
                                                    <div class="dropdown">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fas fa-th" style="font-size:14px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="statuschange" value="">
                                                                <a href="#" class="dropdown-item" data-toggle="modal"  @click="SetEditContent(vendor)" data-target="#EditVendorModal" >Edit</a>
                                                                <a href="#" class="dropdown-item" data-toggle="modal" @click="DeleteVendor(vendor.id );">Delete</a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between mx-2 row"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">&nbsp;</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">&nbsp;</a></li></ul></div></div></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ List DataTable -->
            </div>
            <!-- <==========================  ADD VENDOR MODAL  ===================================> -->
            <!-- Modal -->
                <div class="modal fade" id="vendorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form class="form-horizontal form-material mx-2" @submit.prevent="addVendor" enctype="multipart/form-data">
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
                                                                <label id="basic-addon3">Name of Organisation: </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" class="form-control mb-0" placeholder="Enter Payment Head" 
                                                                aria-describedby="basic-addon3" v-model="form.orgName"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="mt-1">Name of Representation: </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" class="form-control mb-0" placeholder="Enter Name of Representative" 
                                                                aria-describedby="basic-addon3" v-model="form.repName"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="mt-1" for="inputGroupSelect02">Phone Number: </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="tel" class="form-control mb-0" placeholder="Enter Phone Number" 
                                                                aria-describedby="basic-addon3" v-model="form.repNumber" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label class="mt-1">Duty: </label>
                                                        </div>
                                                        <div class="col-12">
                                                            <textarea class="form-control " aria-label="With textarea" v-model="form.repDuty"></textarea>
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

              <!-- <==========================  Edit VENDOR MODAL  ===================================> -->
            <!-- Modal -->
                <div class="modal fade" id="EditVendorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form class="form-horizontal form-material mx-2" @submit.prevent="editVendor" enctype="multipart/form-data">
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
                                                                <label id="basic-addon3">Name of Organisation: </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" class="form-control mb-0" placeholder="Enter Payment Head" 
                                                                aria-describedby="basic-addon3" v-model="Edit_Content.org_name"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="mt-1">Name of Representation: </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" class="form-control mb-0" placeholder="Enter Name of Representative" 
                                                                aria-describedby="basic-addon3" v-model="Edit_Content.rep_name"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="mt-1" for="inputGroupSelect02">Phone Number: </label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="tel" class="form-control mb-0" placeholder="Enter Phone Number" 
                                                                aria-describedby="basic-addon3" v-model="Edit_Content.phone_no" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label class="mt-1">Duty: </label>
                                                        </div>
                                                        <div class="col-12">
                                                            <textarea class="form-control " aria-label="With textarea" v-model="Edit_Content.duty"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Edit</button>
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
    props:['vendors'],
   
    data(){
        return {
           form : {},
           vendorList:[],
           orgName: '',
           repName: '',
           repNumber: '',
           repDuty: '',
           Edit_Content : ''
        }
    },
    methods:{
        addVendor(){
            console.log(this.form) 
            axios.post('add_vendor', this.form)
            .then(res=>{
                swal('Vendor Added successfully!!!', {
                        icon: "success",
                        });
            $('#vendorModal').modal('hide');
            }).catch(err=>{
                swal('Unable to Add Vendor!!!', {
                        icon: "error",
                        });
            })
            this.form = '';
            this.getVendors()
            //refreshing the component to bring lately added daa
        },
        getVendors() {
            // console.log('I am working');
            axios.get('get_vendors').then(res => {
            this.vendorList = res.data.vendors
                // console.log(this.vendorList);
            }).catch(err => {
            swal("Cannot fetch Requistion Title!!!", {
                icon: "error",
                });
            })
            
        },
        DeleteVendor(id,  name) {
                    console.log(id)
                swal({
                    title: "Delete this Vendor?",
                    // text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        axios.delete(`deleteVendor/${id}`)
                        .then((res) => {
                            swal("Vendor deleted Successfully!!!", {
                            icon: "success",
                            });
                            this.getVendors()
                        }).catch(err => console.log(err.data))
                    
                    } else {
                        swal("Canceled!!!");
                    }
                });
            },
        SetEditContent(details){
            // console.log(details)
            this.Edit_Content = details; 
        },
        editVendor(){
                let edited_data = this.Edit_Content;
                axios.post('edit-vendor', edited_data)
                .then(res => {
                    swal("Vendor Edited!!!", {
                        icon: "success",
                    });
                $('#EditVendorModal').modal('hide');
                this.getVendors();
                
                }).catch( err => {
                    console.log(error)
                // swal("Unable to  Edit Requisition Title", {
                //     icon: "error",
                //     });
                })
            }
    },
     mounted() {
         this.getVendors()
    }

}
</script>
<style scoped>

</style>
