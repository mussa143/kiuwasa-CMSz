<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(10);
    
            return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'cname'=>'required',
            'phone'=>'required',
            'acc'=>'required',
            'adress'=> 'required',
            'zone' => 'required'
          ]);
          $customer = new Customer([
            'cname' => $request->get('cname'),
            'phone' => $request->get('phone'),
            'acc' => $request->get('acc'),
            'adress'=> $request->get('adress'),
            'zone'=> $request->get('zone')
          ]);
          $customer->save();

          return redirect('/customer')->with('flash_message', 'customer info has been added!');
    }

    /**
     * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Customer::findOrFail($id);

        return view('customer.show')->withcustomers($customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    $customers = Customer::findOrFail($id);

    return view('customer.edit')->withcustomers($customers);
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
            'cname'=>'required',
            'adress'=> 'required',
            'phone'=> 'required | min:10',
            'acc'=> 'required',
            'zone' => 'required'
          ]);
    
          $customer = Customer::find($id);
          $customer->cname = $request->get('cname');
          $customer->phone = $request->get('phone');
          $customer->acc = $request->get('acc');
          $customer->adress = $request->get('adress');
          $customer->zone = $request->get('zone');
          $customer->save();
    
          return redirect('/customer')->with('flash_message', 'customer info has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Customer::find($id);
        $record->delete();
   
        return redirect('/customer')->with('flash_message', 'Customer has been deleted Successfully');
    }
}
