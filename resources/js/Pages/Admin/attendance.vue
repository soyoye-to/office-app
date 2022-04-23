<template>
    <div>
        <section class="ftco-section">
          <div class="card" >
            <div v-show="authUser.type != 'superadmin'" class="card-body">
                <div  class=" container card bg-success">
                    <div  class="card-body">
                        
                        <h1 class="text-center text-white" id='greetings'>{{authUser.name}}</h1>
                        <!-- <div v-for="(status, index) in greetingsData" :key="index"> -->
                            <h1 class="text-white text-center">{{(signedInStatus == 'signedOut')? 'You are Signed Out, Remember to Sign-in Tomorrow.': ((signedInStatus == 'notSignedOut')? 'You are Signed in. Please Remember to sign out before going home!!!':'You are yet sign in today!!!')}}</h1>
                        <!-- </div> -->
                        <div v-if="signedInStatus !='empty'" class="text-center" style="justify-content:center;">
                                <button v-if="signedInStatus == 'notSignedIn' && signedInStatus != 'signedOut'" class='btn btn-warning text-center'  @click="sign_in">
                                    Sign In
                                </button>
                            
                                <button v-else-if="signedInStatus == 'notSignedOut'" class='btn btn-warning text-center'  @click="sign_out">
                                    Sign Out
                                </button>
                        </div>
                        <div v-else style="justify-content:center;">
                            <button  class='btn btn-warning text-center' @click="sign_in">
                                Sign In
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row d-flex justify-content-between align-items-center m-1">
                        <div class="col-md-3 col-3 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pr-lg-1 p-0">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>
                                    <input v-show="authUser.type != 'user'" type="text" v-model="filters.name" @keyup="getattendance()" class="form-control" placeholder="Search Name" aria-controls="DataTables_Table_0">
                                </label>
                            </div>
                            <div class="invoice_status ml-sm-2">
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-3 d-flex align-items-center justify-content-lg-end flex-lg-nowrap flex-wrap pr-lg-1 p-0">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>
                                    <input type="text" v-model="filters.date" @keyup="getattendance()" class="form-control" placeholder="Search Date" aria-controls="DataTables_Table_0">
                                </label>
                            </div>
                            <div class="invoice_status ml-sm-2">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="invoice-list-table table dataTable no-footer dtr-column table-sm" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="#: activate to sort column ascending">#</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" >Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" >Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">Time Signed In</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">Time Signed Out</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd" v-for="(Attendance, index) in attendance_list.data" :key="index">
                                    <td valign="top" class="dataTables_empty">{{index+1}}</td>
                                    <td >{{Attendance.Date}}</td>
                                    <td >{{Attendance.staffName}}</td>
                                    <td >{{Attendance.Time_signed_in}}</td>
                                    <td >{{Attendance.Time_signed_out}}</td>
                                    <td >{{(Attendance.out_status == 'Signed Out')? 'Signed Out': ((Attendance.in_status == 'Signed in')? 'Signed In':'Signed In')}}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    </div>
                    <br><br>
                    <pagination :data="attendance_list" @pagination-change-page="getattendance"></pagination>
                </div>
          </div>
          <div class="row">
            <div class="card col-md-6 mr-5" >
                <div class="card-body">
                    <h4 class="text-center">Attendance  Table</h4>
                    <div class="table-responsive table-sm">
                        <table  class="invoice-list-table table dataTable no-footer dtr-column table-sm" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead role="row">
                                <tr>
                                    <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="#: activate to sort column ascending">#</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending">This Week</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending">This Month</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": activate to sort column ascending">This Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd" v-for="(datum, ind) in performance_data" :key="ind">
                                    <td valign="top" class="dataTables_empty">{{ind+1}}</td>
                                    <td>{{datum.staff}}</td>
                                    <td>{{datum.total_in_week}}</td>
                                    <td>{{datum.total_in_month}}</td>
                                    <td>{{datum.total_in_year}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card col-md-5" >
                <div class="card-body">
                    <h4 class="text-center">Attendance Chart</h4>
                        <GChart
                        type="PieChart"
                        :options="pie_options"
                        :data="pie_data"
                        /> 
                </div>
            </div>
          </div>  
        </section>
    </div>
</template>
<script>
    import Layout from '../Layouts/Layout.vue'
    //   importing layout for pages outside admin folder
    import { GChart } from "vue-google-charts";

    export default {
                // Using a render function
        layout: (h, page) => h(Layout, [page]),
        
        components: {
        //   Head,
            Layout,
            GChart,
        },
        props:[],
        data () {
            return {
               authUser: this.$page.props.auth.user,
               attendance_list:{data:[]},
               greetingsData:'',
               status: false,
               signedInStatus:'',
               filters:{},
               performance_data:[],
               pie_data: [
                    ['Daily Routine', 'Hours per Day'],
                    ['Work',     14],
                    ['Eat',      1],
                    ['Reading',  2],
                    ['Exercise', 2],
                    ['Sleep',    5]
                ],
                pie_options: {
                    width: 350,
                    height: 350,
                    is3D:true,
                },
            }
        },
        methods :{
            momentChecker(){
                var now = new Date();
                var hrs = now.getHours();
                var msg = "";

                if (hrs >= 0 && hrs <= 11) {
                    msg = "Good Morning";
                }else if(hrs >= 12 && hrs <= 16  ) {
                    msg = "Good Afternoon";
                }else if(hrs >= 17 && hrs <= 24  ) {
                    msg = "Good Evening";
                }
                // console.log(document.getElementById('greetings').innerHTML);
                document.getElementById('greetings').innerHTML = msg +', ' + document.getElementById('greetings').innerHTML;
    

            },
            sign_in(){
                // alert('working')
                 axios.post('sign_in')
                .then(res=>{
                    swal('You are now present, Remember to sign out later!', {
                            icon: "success",
                            });
                }).catch(err=>{
                    swal('Unable to Mark Present!!!', {
                            icon: "error",
                            });
                })
            this.getattendance()

            },
            sign_out(){
                // document.getElementById('att_id2').style.display='none';
                // console.log(this.$page.props);
                
                 axios.post('sign_out')
                .then(res=>{
                    swal('You have succesfully signed out, Remember to sign in tomorrow!!!', {
                            icon: "success",
                            });
                }).catch(err=>{
                    swal('Unable to Sign Out!!!', {
                            icon: "error",
                            });
                })
            this.getattendance()
            },
            getattendance(page=1){

                axios.post('get_attendance_list?page='+page, {filters:this.filters}).then(res => {
                this.attendance_list = res.data.attendance_list
                console.log(this.attendance_list);
                // console.log(this.attendance_list[this.attendance_list.length - 1]);
                this.signedInStatus = res.data.signedInStatus
                // console.log(this.signedInStatus);
                
                }).catch(err => {
                // swal("Cannot fetch Attendance List!!!", {
                //     icon: "error",
                //     });
                console.log('Cannot fetch Attendance List!!!')
                })
            },
            statusTeller(){
                axios.get('get_attendance_4_loggedin_user').then(res => {
                this.greetingsData = res.data.attendance_4Staff
                // console.log(this.greetingsData)
                }).catch(err => {
                swal("Cannot fetch your Attendance List!!!", {
                    icon: "error",
                    });
                })
            },
            getLocation() {
                console.log(navigator)
                // var x = document.getElementById("demo");
                // if (navigator.geolocation) {
                //     navigator.geolocation.getCurrentPosition(this.showPosition);
                // } else {
                //     x.innerHTML = "Geolocation is not supported by this browser.";
                // }
            },
            getAttendanceChart(){
                axios.get('getAttendanceData').then(res => {
                this.pie_data = res.data.attendancePieData
                // console.log(this.pie_data);
                }).catch(err => {
                swal("Cannot fetch Attendance Chart Data!!!", {
                    icon: "error",
                    });
                })
            },
            getAttendanceTable(){
                axios.get('get_attendance_table').then(res => {
                this.performance_data = res.data.performance_data
                }).catch(err => {
                swal("Cannot fetch Attendance Performance Data!!!", {
                    icon: "error",
                    });
                })
            }
            
            // showPosition(position) {
            //     var x = document.getElementById("demo");
            //     x.innerHTML = "Latitude: " + position.coords.latitude + 
            //     "<br>Longitude: " + position.coords.longitude; 
            // }

             

            
            
        },
        mounted() {
            this.momentChecker()
            // this.statusTeller()
            this.getattendance()
            this.getAttendanceChart()
            this.getAttendanceTable()
            // console.log(this.month_performance_data)
            // console.log(this.$page.props.auth.user.id);

        }

    }
</script>
<style scoped>

</style>
