<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function addLeave(Request $request) {
        $userId = Auth::user()->id;
        $addRoles = Leave::create([
            'user_id' => $userId,
            'Purpose' => $request->lTitle,
            'reason' => $request->lPurpose,
            'time_from' => $request->dateFrom,
            'time_to' => $request->dateTo,
            'status' => 'pending'
        ]);
      
        if($addRoles) {
            return response([
                'mssg' => 'Role Added Successfully!!!'
            ],200);
        }

        return response([
            'error' => 'Unable to Add new Role !!!'
        ],400);
    }
    
    public function getLeaveApplicants() {
        $applicantList = leave::join('users', 'users.id', '=', 'leaves.user_id')
        ->select('leaves.*','users.name as staffName' );
        if (auth()->user()->type != 'superadmin') {
            $applicantList->where("leaves.user_id", auth()->user()->id);
        }
        if (request()->has('filters')) {
            if (!is_null(request()->input('filters.name'))) {
                // dd(request()->input('filters.name'));
                $applicantList->where("users.name", "like","%".request()->input('filters.name')."%");
            }
            if (!is_null(request()->input('filters.purpose'))) {
                // dd(request()->input('filters.name'));
                $applicantList->where("leaves.Purpose", "like","%".request()->input('filters.purpose')."%");
            }
            if(!is_null(request()->input('filters.date'))){
                // dd(request()->input('filters.date'));
                $applicantList->where("leaves.time_from", "like","%".request()->input('filters.date')."%");
            }
        }
        $applicantList = $applicantList->get();
        return response([
            'apllicantList' => $applicantList
        ],200);
        
    }
    public function editApplication(Request $request) {
        // dd($request);
        $editApplications = leave::where('id', $request->id)->first();
        $editApplications->reason = $request->reason;
        $editApplications->Purpose = $request->Purpose;
        $editApplications->time_to = $request->time_to;
        $editApplications->time_from = $request->time_from;

        if($editApplications->save()) {
            return response([
                'mssg' => 'Application Successfully Edited'
            ], 200);
        }
        return response([
            'error' => 'Unable to Edit Application'
        ], 409);
    }

    public function deleteLeave($id) {
        $deleteLeaves =  Leave::where('id', $id)->delete();
        return response(([
            'Response' => "Leave Application Deleted!!! "
        ]));
    }

    public function approveLeave($id) {
        $approve = leave::where('id', $id)->first();
        $approve->status = 'approved';    
      
        if($approve->save()) {
            return response([
                'mssg' => 'Application Approved!!!'
            ],200);
        }

        return response([
            'error' => 'Unable to Approve Application !!!'
        ],400);
    }

    public function rejectLeave($id) {
        $reject = leave::where('id', $id)->first();
        $reject->status = 'declined';    
      
        if($reject->save()) {
            return response([
                'mssg' => 'Application Rejected!!!'
            ],200);
        }

        return response([
            'error' => 'Unable to Rejected Application !!!'
        ],400);
    }
}
