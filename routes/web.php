<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\PostController;
// use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\AccountingController;
use App\Http\Controllers\Admin\AllocationController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\IssuesController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\RolesAndPermissionController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\AccountStatementController;
use App\Http\Controllers\Admin\SetupController;
//describing the directory for the code to get the controller
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RequisitionAnalyticsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('looor');
});

Route::get('/maaa', function () {
    return Inertia::render('Haaa');
});


Route::get('/login', function () {
    return Inertia::render('looor');
})->name('login');



Route::get('/logout', function () {
    Auth::user()->logout();
});
//Authenticated route.. Users must be logged in
Route::middleware('auth')->group(function(){
    Route::get('/register', [AdminController::class, 'register']);
    Route::get('/dashboard', function() {
        return Inertia::render('Admin/AdminDashboard');
    });
    Route::get('/menu', [MenuController::class, 'Menu']);
    Route::get('/profile', [AdminController::class, 'profile']);
    Route::get('/get-profile', [AdminController::class, 'show']);
    Route::post('/update-profile', [AdminController::class, 'update']);
    Route::post('/add_user', [AdminController::class, 'add_user']);
    Route::post('/add_reqTitle', [AdminController::class, 'add_reqTitle']);
    Route::get('/reqTitle', [AdminController::class, 'reqTitle']);
    Route::get('/get_reqTitle', [AdminController::class, 'receiveTitles']);
    Route::delete('/deletePayHead/{id}', [AdminController::class, 'deletePayHead']);
    Route::post('/edit-reqTitle', [AdminController::class, 'editReqTitle']);
    // Route::get('/staffManager', [AdminController::class, 'staffManager']);deleteStaff
    Route::get('/get_staff', [AdminController::class, 'receiveStaff']);
    Route::delete('/deleteStaff/{id}', [AdminController::class, 'deleteStaff']);
    Route::post('/edit-staff', [AdminController::class, 'editStaff']);
    //getting all dept and pos
    Route::get('/staffManager', [AdminController::class, 'deptAndPos']);
    Route::post('/add_vendor', [VendorController::class, 'add_reqTitle']);
    Route::get('/get_vendors', [VendorController::class, 'receiveVendors']);
    Route::delete('/deleteVendor/{id}', [VendorController::class, 'deleteVendor']);
    Route::post('/edit-vendor', [VendorController::class, 'editVendor']);
    Route::get('/get_staffList', [AdminController::class, 'getStaff']);
    Route::post('/add_new_dept', [AdminController::class, 'add_new_dept']);
    Route::post('/add_new_pos', [AdminController::class, 'add_new_pos']);
    Route::post('/allocate-dept', [AdminController::class, 'allocateDept']);
    Route::post('/allocate-pos', [AdminController::class, 'allocatePos']);
    Route::get('/get_staffList_For_Position', [AdminController::class, 'getStaffListForPosition']);
    Route::get('/position_History/{id}', [AdminController::class, 'getPositionHistory']);
    Route::get('/department_History/{id}', [AdminController::class, 'getDepartmentHistory']);
    Route::post('/add_role', [RoleController::class, 'addRole']);
    Route::get('/get_roles', [RoleController::class, 'getRole']);
    Route::post('/edit-role', [RoleController::class, 'editRole']);
    Route::delete('/deleteRoles/{id}', [RoleController::class, 'deleteRoles']);

    Route::post('/add_permission', [PermissionController::class, 'addPermission']);
    Route::get('/Roles-and-Permission', [RolesAndPermissionController::class, 'index']);
    Route::get('/showPermissions', [RolesAndPermissionController::class, 'getPermissions']);
    Route::post('/attachPermissions', [RolesAndPermissionController::class, 'attachPermissions']);
    Route::get('/get_role_permissions/{id}', [RolesAndPermissionController::class, 'getRolesPermissions']);
    Route::get('/search-user', [RolesAndPermissionController::class, 'searchUser']);
    Route::get('/showRoles', [RolesAndPermissionController::class, 'show_Roles']);
    Route::post('/attachRoles', [RolesAndPermissionController::class, 'attach_Roles']);
    Route::post('/attachDirectPermissions', [RolesAndPermissionController::class, 'attach_direct_permissions']);
    Route::get('/get_users_permissions/{id}', [RolesAndPermissionController::class, 'getUsersPermissions']);

    Route::get('/req_Staff', [RequisitionController::class, 'getStaffOption']);
    Route::get('/req_Vendor', [RequisitionController::class, 'getVendorOption']);
    Route::post('/create_requisition', [RequisitionController::class, 'createRequisition']);
    Route::post('/get_requisitions', [RequisitionController::class, 'getRequisition']);
    // Route::get('/get_requisitions', [RequisitionController::class, 'getRequisitionAfterAdding']);
    Route::post('/edit_requisition', [RequisitionController::class, 'editRequisition']);
    Route::delete('/delete_Requisition/{id}', [RequisitionController::class, 'deleteRequisition']);
    Route::post('/approve_requisition', [RequisitionController::class, 'approveRequisition']);
    Route::post('/decline_requisition', [RequisitionController::class, 'declineRequisition']);
    Route::get('/get_history/{req_num}', [RequisitionController::class, 'getHistory']);
    Route::get('/get_all_payHeads', [AdminController::class, 'get_all_payHeads']);
    Route::post('/pay_bal', [RequisitionController::class, 'payBal']);
    Route::post('/stepdown_requisition', [RequisitionController::class, 'stepdownRequisition']);
    Route::post('/recommend_requisition', [RequisitionController::class, 'recommendRequisition']);
    Route::get('/getStatement', [AccountStatementController::class, 'getAccountStatment']);
    Route::get('/getMonthlyExpenditure', [RequisitionAnalyticsController::class, 'getMonthlyExpenditure']);
    Route::get('/getExpenditurePerPayHead', [RequisitionAnalyticsController::class, 'getExpenditurePerPayHead']);
    Route::get('/getDeptAndTotal', [RequisitionAnalyticsController::class, 'getDeptTotals']);
    // Route::get('/getrequisitionsAnalysis', [RequisitionController::class, 'analytics_for_requisition']);










    Route::post('/add_event', [EventController::class, 'addEvent']);
    Route::get('/get_events', [EventController::class, 'getEvents']);
    Route::delete('/deleteEvent/{id}', [EventController::class, 'deleteEvent']);
    Route::post('/edit-event', [EventController::class, 'editEvent']);

    Route::post('/add_leave', [LeaveController::class, 'addLeave']);
    Route::post('/get_leave_applicants', [LeaveController::class, 'getLeaveApplicants']);
    Route::post('/edit-application', [LeaveController::class, 'editApplication']);
    Route::delete('/deleteLeave/{id}', [LeaveController::class, 'deleteLeave']);
    Route::post('/approveLeave/{id}', [LeaveController::class, 'approveLeave']);
    Route::post('/rejectLeave/{id}', [LeaveController::class, 'rejectLeave']);

    
    Route::post('/sign_in', [AttendanceController::class, 'signIN']);
    Route::post('/sign_out', [AttendanceController::class, 'signOUT']);
    Route::post('/get_attendance_list', [AttendanceController::class, 'getAttendanceList']);
    Route::get('/get_attendance_4_loggedin_user', [AttendanceController::class, 'getAttendance4Staff']);
    Route::get('/getAttendanceData', [AttendanceController::class, 'getAttendanceChart']);
    Route::get('/get_attendance_table', [AttendanceController::class, 'getAttendanceTable']);



    Route::get('/get_dashboard_req_total', [AdminController::class, 'getDashboardReqTotal']);














    // SETUP ROUTES
    Route::group(['prefix' => '/setup'], function() {

    });

    // ALLOCATION ROUTES
    Route::group(['prefix' => '/allocation'], function() {

    });


    // ACCOUNTING ROUTES
     Route::group(['prefix' => '/accounting'], function() {

    });

    // Issues ROUTES
     Route::group(['prefix' => '/issue'], function() {

    });

    // Attendance ROUTES
    Route::group(['prefix' => '/attendance'], function() {

    });

    // Leave ROUTES
    Route::group(['prefix' => '/leave'], function() {

    });


    // Events ROUTES
    Route::group(['prefix' => '/events'], function() {

    });
//ROute to render page and send department and position as props
    Route::get('/staffManager',[AdminController::class, 'staffManager']
    );
    Route::get('/requisition', [RequisitionController::class, 'requisition']);

    

    Route::get('/vendorManager', function() {
        return Inertia::render('Admin/vendorManager');
    });
    
    Route::get('/account_statement',[AccountStatementController::class, 'accountStatement']
    );
   
    Route::get('/events', function() {
        return Inertia::render('Admin/events');
    });

    Route::get('/leave', function() {
        return Inertia::render('Admin/leave');
    });

    Route::get('/requisition_analytics',[RequisitionAnalyticsController::class, 'requisitionAnalytics']
    );

    // Route::get('/attendance',[AttendanceController::class, 'attendanceAnalytics']
    // );
    // Route::get('/requisition_analytics', function() {
    //     return Inertia::render('Admin/requisition_analytics');
    // });

    Route::get('/attendance', function() {
        return Inertia::render('Admin/attendance');
    });

    Route::get('/departmentManager', [AdminController::class, 'departmentManager']);
    Route::get('/positionManager', [AdminController::class, 'positionManager']);

    // Route::get('/events', [EventController::class, 'events']);

 
    //Change Password
    //it's post because the axios in topnav bar is sending a post request
    //I dont need function because i want to do something with database
    Route::post('/changePassword', [UsersController::class, 'changePassword']);
});
