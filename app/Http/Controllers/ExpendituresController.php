<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenditure;
use App\Ex;
use App\Customer;
use DB;

class ExpendituresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balance = DB::table('expenditures')->sum('amount');
        $expenditures = Expenditure::paginate(10);
    
        return view('expenditure.index', compact('expenditures','balance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows = Ex::all();
        $cus = Customer::all();
        return view('expenditure.create', compact('rows','cus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'=>'required',
            'monthy'=>'required',
            'amount'=>'required',
            'staff'=> 'required',
          ]);
          $expend = new Expenditure([
            'type' => $request->get('type'),
            'monthy' => $request->get('monthy'),
            'amount' => $request->get('amount'),
            'staff'=> $request->get('staff'),
          ]);
          $expend->save();

          return redirect('/expenditure')->with('flash_message', 'Expenditure info has been added! Thank you');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
