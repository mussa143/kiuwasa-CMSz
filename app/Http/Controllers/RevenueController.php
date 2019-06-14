<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revenue;
use App\Rcategory;
use App\Customer;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenues = Revenue::paginate(4);
        return view('revenue.index', compact('revenues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Rcategory::all();
        $cus = Customer::all();
        return view('revenue.create', compact('category','cus'));
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
            'amount'=> 'required',
            'customer'=> 'required'
            
          ]);
          $cat= new Revenue([
            'type' => $request->get('type'),
            'amount'=> $request->get('amount'),
            'customer'=> $request->get('customer'),
          ]);
          $cat->save();

          return redirect('/revenue')->with('flash_message', 'New Revenue Record has been added!');
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
        $revenues = Revenue::findOrFail($id);

        return view('revenue.edit')->withrevenues($revenues);
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
        $request->validate([
            'type'=>'required',
            'amount'=> 'required',
            'customer' => 'required'
          ]);
    
          $revenues = Revenue::find($id);
          $revenues->type = $request->get('type');
          $revenues->amount = $request->get('amount');
          $revenues->customer = $request->get('customer');
          $revenues->save();
    
          return redirect()->back()->with('flash_message', 'info has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Revenue::find($id);
        $record->delete();
   
        return redirect('/revenue')->with('flash_message', 'Record has been deleted Successfully');
    }
}
