<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AttendanceController extends Controller
{

    public function signIN() {
        $mydate=getdate(date("U"));
        $date =  "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
        date_default_timezone_set('Africa/Lagos');
        $time_in = date('h:i:sa');
        $attendance = Attendance::create([
            'user_id' => auth()->user()->id,
            'Time_signed_in' => $time_in,
            'Date'=> $date,
            'in_status' => 'Signed In'
        ]);
        if($attendance) {
            return response([
                'mssg' => 'Attandance Marked!!!'
            ],200);
        }

        return response([
            'error' => 'Unable to Mark Attendance !!!'
        ],400);
    }
    public function signOUT() {
        $mydate=getdate(date("U"));
        $date =  "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
        date_default_timezone_set('Africa/Lagos');
        $time_out = date('h:i:sa');

        $sign_out = Attendance:: where(['user_id'=> auth()->user()->id])->whereDate('created_at', '=',Carbon::today()->toDateString())->first();
        // ->orderBy('created_at', 'DESC')->first();
        $sign_out -> Time_signed_out = $time_out;
        $sign_out -> out_status = 'Signed Out';      
        // dd($sign_out);
        if($sign_out->save()) {
            return response([
                'mssg' => 'Signed Out'
            ], 200);
            return response([
                'error' => 'Unable to Sign Out'
            ], 409);
        }
    }
    public function getAttendanceList() {
        $signedInStatus = 'empty';
        $attendance_list = Attendance::join('users', 'users.id', '=', 'attendances.user_id')
        ->select('attendances.*','users.name as staffName');

        if (auth()->user()->type != 'superadmin') {
            $attendance_list->where("attendances.user_id", auth()->user()->id);
        }
        if (request()->has('filters')) {
            if (!is_null(request()->input('filters.name'))) {
                // dd(request()->input('filters.name'));
                $attendance_list->where("users.name", "like","%".request()->input('filters.name')."%");
            }
            if(!is_null(request()->input('filters.date'))){
                // dd(request()->input('filters.date'));
                $attendance_list->where("attendances.Date", "like","%".request()->input('filters.date')."%");
            }
        }
        $attendance_list = $attendance_list-> paginate(10);
       if (count($attendance_list) > 0) {
            $todayRecord = $attendance_list[count($attendance_list)-1];
        
            if($todayRecord['created_at']->isToday()){
                if (!is_null($todayRecord['out_status'])) {
                    $attendance_list[count($attendance_list)-1]['signedInStatus']= 'signedOut';
                }else{
                    $attendance_list[count($attendance_list)-1]['signedInStatus']= 'notSignedOut';
                }
            }else{
                $attendance_list[count($attendance_list)-1]['signedInStatus']= 'notSignedIn';
            }
        $signedInStatus = $attendance_list[count($attendance_list)-1]['signedInStatus'];
       }
       
       
        // dd($attendance_list);
        return response([
            'attendance_list' => $attendance_list,
            'signedInStatus' => $signedInStatus
        ],200);
    }
    public function getAttendance4Staff() {
        $attendance_4Staff = Attendance::where('user_id', auth()->user()->id)->first();
        $attendance_4Staff ->get();
        // dd($attendance_4Staff);
        return response([
            'attendance_4Staff' => $attendance_4Staff
        ],200);
    }
    public function getAttendanceChart() {
        $attendanceChart = DB:: table('attendances')
        ->selectRaw('COUNT(users.id) as presentTime, users.name as Staff')
        ->join('users', 'users.id', 'attendances.user_id')
        ->groupBy('Staff')
        ->get();
        // dd($attendanceChart);
        $attendanceData[]= ['Staff', 'presentTime'];
        foreach($attendanceChart as $value) {
            $attendanceData[]= array($value ->Staff, (int)$value->presentTime);
        }
        return response([
            'attendancePieData' =>  $attendanceData
         ],200);
    }
    public function getAttendanceTable() {
        $year_performance_data = DB::select('SELECT COUNT(a.user_id) AS totalYear, u.name AS staff
        FROM attendances a 
        LEFT JOIN users u 
        ON u.id = a.user_id 
        where Year(date(a.created_at)) = Year(NOW())
        GROUP BY u.id, a.user_id, u.name');

        // dd($attendanceTable);
        $month_performance_data = DB::select('SELECT COUNT(a.user_id) AS totalMonth, u.name AS staff
        FROM attendances a 
        LEFT JOIN users u 
        ON u.id = a.user_id 
        where MONTH(date(a.created_at)) = MONTH(NOW())
        GROUP BY u.id, a.user_id, u.name');

        $week_performance_data = DB::select('SELECT COUNT(a.user_id) AS totalWeek, u.name AS staff
        FROM attendances a 
        LEFT JOIN users u 
        ON u.id = a.user_id 
        where YEARWEEK(date(a.created_at)) = YEARWEEK(NOW())
        GROUP BY u.id, a.user_id, u.name');
        
        $array=[];
        //pushing the staff names and number of time present in a year to the array
        foreach($year_performance_data as $value){
            $array[]=["staff" => $value->staff,"total_in_year" => $value->totalYear, "total_in_month" => 0, "total_in_week" => 0];
        }
        //Pushing the value for monthPerformance into the array
        foreach($month_performance_data as $value){
                foreach($array as $key => $ar){
                    if($ar["staff"] == $value->staff) {
                       $array[$key]["total_in_month"] = $value->totalMonth;
                    }
                }
        }
        //Pushing the value for weekPerformance into the array
        foreach($week_performance_data as $value){
            foreach($array as $key => $ar){
                if($ar["staff"] == $value->staff) {
                   $array[$key]["total_in_week"] = $value->totalWeek;
                }
            }
        }
       
        return response([
            'performance_data' => $array,
        ],200);

        
    }
    
}
