<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;
use App\User;
use App\Revenue;

class ChartController extends Controller
{
    public function index()
    {
        $arr_view_data = [];
        $users         = Revenue::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart         = Charts::database($users, 'bar', 'highcharts')
                                  ->title("Monthly new Revenues")
                                  ->elementLabel("Total Revenue")
                                  ->dimensions(1000, 500)
                                  ->responsive(false)
                                  ->groupByMonth(date('Y'), true);
 
        $arr_view_data['chart'] = $chart;
        
        return view('home',$arr_view_data);
    }
}
