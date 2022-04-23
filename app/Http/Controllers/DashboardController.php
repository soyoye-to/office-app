<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Requisition;
use App\Models\ReqTransactions;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function receiveStaff() {
        $totalAmountOnStaff = ReqTransactions:: join('requisitions', 'req_transactions.requisition_id', 'requisitions.id')
        ->select('requisitions.for_user ', 'requisitions.for_vendor as totalForVendor')
        ->SUM('req_transactions.amount_paid')
        ->get();
       
        return response([
            'staffs' => $totalAmountOnStaff
        ],200);
        
    }
}
