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
                                            <div class="col-lg-6 d-flex align-items-center">
                                                <div class="dropdown float-right" v-if="(userType == 'superadmin')||(userType == 'admin')">
                                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fas fa-th" style="font-size:14px;"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="statuschange" value="">
                                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addEventModal" >Add new Event</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-2 mr-2 row">
                                            <div class="col-md-4 mb-3 curve" v-for="(event, index) in eventList" :key="index">
                                                <div class="card shadow-lg  text-white" style="z-index: 1 !important; ">
                                                    <div class="card-body bg-warn text-center" style="box-sizing: border-box !important;min-height: 200px !important;z-index: 5 !important;">
                                                        <h2 class="my-2">
                                                        {{event.event_title}}
                                                        </h2>
                                                        <p class="" style="line-height: 29px !important;margin-top: 5vh !important; font-size: 1.2rem !important; font-family: cursive !important">
                                                        {{event.event_desc}}
                                                        </p>

                                                    </div>
                                                    <div class="card-footer py-1 px-1" style="position:relative;">
                                                        <span class="text-left text-danger" style="text-align: left !important; font-size: 1.1rem !important">
                                                        {{event.event_date}}
                                                        </span>
                                                        <span class="float-right" v-if="(userType == 'superadmin')||(userType == 'admin')">
                                                            <button type="submit" data-toggle="modal" data-target="#editEventModal" class="btn btn-outline-success btn-sm" @click="SetEditContent(event)">Edit</button>
                                                            <button type="submit" class="btn btn-outline-danger btn-sm" @click="DeleteEvent(event.id);">Delete</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ List DataTable -->
            </div>
              <!-- <==========================  ADD EVENT MODAL  ===================================> -->
            <!-- Modal -->
                <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form class="form-horizontal form-material mx-2" @submit.prevent="createEvent" enctype="multipart/form-data">
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
                                                                <label id="basic-addon3">Event Title: </label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control mb-0" placeholder="Enter Event Title" aria-describedby="basic-addon3" v-model="form.eTitle">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label id="basic-addon3">Date: </label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="date" class="form-control mb-0"  aria-describedby="basic-addon3" v-model="form.eDate">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label class="mt-2">Event Description: </label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea class="form-control " placeholder="Enter Event Description" aria-label="With textarea" v-model="form.eDesc"></textarea>
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
            <!-- <===========================   EDIT EVENT MODAL ========================================> -->
            <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form class="form-horizontal form-material mx-2" @submit.prevent="editEvent" enctype="multipart/form-data">
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
                                                    <label id="basic-addon3">Event Title: </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control mb-0" placeholder="Enter Event Title" aria-describedby="basic-addon3" v-model="Edit_Content.event_title">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label id="basic-addon3">Date: </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="date" class="form-control mb-0"  aria-describedby="basic-addon3" v-model="Edit_Content.event_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="mt-2">Event Description: </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea class="form-control " placeholder="Enter Event Description" aria-label="With textarea" v-model="Edit_Content.event_desc"></textarea>
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
                eventList : [],
                eDesc:"",
                eTitle:"",
                eDate:"",
                Edit_Content : '',
                userType:this.$page.props.auth.user.type,
               
            }
        },
        methods :{
            createEvent(){
                axios.post('add_event', this.form)
                .then(res=>{
                    swal('Event Added successfully!!!', {
                            icon: "success",
                            });
                $('#addEventModal').modal('hide');
                }).catch(err=>{
                    swal('Unable to Add Event!!!', {
                            icon: "error",
                            });
                })
                this.form = '';
                this.getEvent()
            },
            //recieving tiltes from database
            getEvent() {
                axios.get('get_events').then(res => {
                this.eventList = res.data.eventList
                }).catch(err => {
                swal("Cannot fetch Events!!!", {
                    icon: "error",
                    });
                })
                
            },
            //deleting Titles
            DeleteEvent(id) {
                swal({
                    title: "Delete this Event?",
                    // text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        axios.delete(`deleteEvent/${id}`)
                        .then((res) => {
                            swal("Event deleted Successfully!!!", {
                            icon: "success",
                            });
                            this.getEvent()
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
            editEvent(){
                let edited_data = this.Edit_Content;
                axios.post('edit-event', edited_data)
                .then(res => {
                    swal("Event Edited!!!", {
                        icon: "success",
                    });
                $('#editEventModal').modal('hide');
                this.getEvent();
                
                }).catch( err => {
                    console.log(error)
                // swal("Unable to  Edit Requisition Title", {
                //     icon: "error",
                //     });
                })
            }
        },
        mounted() {
            this.getEvent()
        }

    }
</script>
<style scoped>
    .bg-warn{
        background-color:rgb(248, 186, 70)
    }
    .curve{
        border-radius: 20px;
    }
</style>
