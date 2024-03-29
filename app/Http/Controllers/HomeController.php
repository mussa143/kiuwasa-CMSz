<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;
use App\Customer;
use App\User;
use App\Revenue;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $revenue = DB::table('revenue')->sum('amount');
        $customers = Customer::all();
        $users = User::all();
        $count1 = $customers->count();
        $count2 = $users->count();
        $expenditure = DB::table('expenditures')->sum('amount');
        $arr_view_data = [];
        $users         = Revenue::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart         = Charts::database($users, 'bar', 'highcharts')
                                  ->title("Monthly new Revenues")
                                  ->elementLabel("Total Revenue")
                                  ->dimensions(1000, 500)
                                  ->responsive(false)
                                  ->groupByMonth(date('Y'), true);
 
        $arr_view_data['chart'] = $chart;
        
        
        return view('home', compact('revenue','expenditure','count1','chart','count2','arr_view_data'));
    }
}
