<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Requisition;
use App\Models\ReqTransactions;
use App\Models\PaymentHead;
use Illuminate\Support\Facades\DB;

class RequisitionAnalyticsController extends Controller
{
    public function requisitionAnalytics(){
        $week = DB::select('SELECT SUM(rt.amount_paid) AS weekPaid, d.dept 
                            FROM departments d 
                            LEFT JOIN users u 
                            ON u.dept_id = d.id 
                            LEFT JOIN requisitions r 
                            ON r.raised_by_id = u.id  
                            LEFT JOIN req_transactions rt
                            ON rt.requisition_id = r.id
                            AND YEARWEEK(date(payment_date)) = YEARWEEK(NOW())
                            GROUP BY d.id, d.dept');

        $month = DB::select('SELECT SUM(rt.amount_paid) AS totalMonth, d.dept 
                            FROM departments d 
                            LEFT JOIN users u 
                            ON u.dept_id = d.id 
                            LEFT JOIN requisitions r 
                            ON r.raised_by_id = u.id  
                            LEFT JOIN req_transactions rt
                            ON rt.requisition_id = r.id
                            AND MONTH(date(payment_date)) = MONTH(NOW())
                            GROUP BY d.id, d.dept');

        $year = DB::select('SELECT SUM(rt.amount_paid) AS totalYear, d.dept 
                            FROM departments d 
                            LEFT JOIN users u 
                            ON u.dept_id = d.id 
                            LEFT JOIN requisitions r 
                            ON r.raised_by_id = u.id  
                            LEFT JOIN req_transactions rt
                            ON rt.requisition_id = r.id
                            AND Year(date(payment_date)) = Year(NOW())
                            GROUP BY d.id, d.dept');
        
        $totalDaySpent = DB::select('SELECT SUM(req_transactions.amount_paid) AS todayTotal FROM req_transactions
        where day(date(payment_date)) = day(NOW())');
        
        $totalWeekSpent = DB::select('SELECT SUM(req_transactions.amount_paid) AS Weekly FROM req_transactions
        where YEARWEEK(date(payment_date)) = YEARWEEK(NOW())');

        $totalMonthSpent = DB::select('SELECT SUM(req_transactions.amount_paid) AS monthly FROM req_transactions
        where MONTH(date(payment_date)) = MONTH(NOW())');

        $totalYearSpent = DB::select('SELECT SUM(req_transactions.amount_paid) AS yearly FROM req_transactions
        where Year(date(payment_date)) = Year(NOW())');

        return Inertia::render('Admin/requisition_analytics', [
            'weekTotal' =>  $week,
            'monthTotal' =>  $month,
            'yearTotal' =>  $year,
            'totalDaySpent' => $totalDaySpent,
            'totalWeekSpent' => $totalWeekSpent,
            'totalMonthSpent' => $totalMonthSpent,
            'totalYearSpent' => $totalYearSpent
        ]);
    }
    public function getMonthlyExpenditure() {
        $monthlyExpenditure = DB:: table('req_transactions')
        ->selectRaw('sum(amount_paid) as monthly_expenditure, MONTHNAME(payment_date) as month')
        ->groupBy('month')
        ->get();
        $monthData[]= ['Month', 'monthly_expenditure'];
        foreach($monthlyExpenditure as $value) {
            $monthData[]= array($value ->month, (int)$value->monthly_expenditure);
        }
        
        return response([
            'monthlyExpenditure' =>  $monthData
         ],200);
       
        
    }
    public function getExpenditurePerPayHead() {
        $expenditurePerPayHead = DB:: table('requisitions')
        ->selectRaw('sum(amount_paid) as Amount, p.req_title as Title')
        ->leftJoin('req_transactions as req', 'requisitions.id', 'req.requisition_id')
        ->leftJoin('payment_heads as p', 'p.id', 'requisitions.req_title')
        ->groupBy('p.req_title')
        ->get();
        $expData[]= ['Title', 'Amount'];
        foreach($expenditurePerPayHead as $value) {
            $expData[]= array($value ->Title, (int)$value->Amount);
        }
        
        return response([
            'expenditurePerPayHead' =>  $expData
         ],200);
    
        
    }
    public function getDeptTotals() {
        $today = DB::select('SELECT SUM(rt.amount_paid) AS todayPaid, d.dept 
                                FROM departments d 
                                LEFT JOIN users u 
                                ON u.dept_id = d.id 
                                LEFT JOIN requisitions r 
                                ON r.raised_by_id = u.id  
                                LEFT JOIN req_transactions rt
                                ON rt.requisition_id = r.id
                                AND day(date(payment_date)) = day(NOW())
                                GROUP BY d.id, d.dept');
        
        return response([
            'deptAndTotal' =>  $today
         ],200);    
        
    }

}
