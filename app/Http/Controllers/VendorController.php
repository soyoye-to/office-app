<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function add_reqTitle(Request $request) {
        // dd($request->all());
        $vendorList = Vendor::create([
            'org_name' => $request->orgName,
            'rep_name' => $request->repName,
            'phone_no' => $request->repNumber,
            'duty' => $request->repDuty
        ]);
      
        if($vendorList) {
            return response([
                'mssg' => 'Payment Head Successfully Added!!!'
            ],200);
        }

        return response([
            'error' => 'Unable to Add Payment Head !!!'
        ],400);
    }
    public function receiveVendors() {
        $vendorList = Vendor::all();
        // dd($vendorList);
        return response([
            'vendors' => $vendorList
        ]);        
    }
    public function deleteVendor($id) {
        // dd($id);
        $deleteVendors =  Vendor::where('id', $id)->delete();
        return response(([
            'Response' => "Vendor Deleted!!! "
        ]));
    }
    public function editVendor(Request $request) {
        // dd($request);
        $editVen = Vendor::where('id', $request->id)->first();
        $editVen->org_name = $request->org_name;
        $editVen->phone_no = $request->phone_no;
        $editVen->rep_name = $request->rep_name;
        $editVen->duty = $request->duty;
        
        if($editVen->save()) {
            return response([
                'mssg' => 'Vendor Successfully Edited!!!'
            ], 200);
        }
        return response([
            'error' => 'Unable to Edit Vendor'
        ], 409);
    }
}
