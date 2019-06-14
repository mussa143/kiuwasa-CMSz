<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zone;

class ZonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $zones = Zone::all();
        return view('zones.index', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zones.create');
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
            'zname'=>'required',
            
          ]);
          $zones= new Zone([
            'zname' => $request->get('zname'),
          ]);
          $zones->save();

          return redirect('/zone')->with('flash_message', 'New Zone has been successfuly added!');
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
        $zones = Zone::findOrFail($id);

        return view('zones.edit')->withzones($zones);
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
            'zname'=>'required',
          ]);
    
          $zone = Zone::find($id);;
          $zone->zname = $request->get('zname');
          $zone->save();
    
          return redirect('/zone')->with('flash_message', 'zone info has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Zone::find($id);
        $record->delete();
   
        return redirect('/zone')->with('flash_message', 'Zone name has been deleted Successfully');
    }
}
