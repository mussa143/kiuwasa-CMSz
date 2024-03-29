<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources;
use App\Water;
class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Sources::paginate(4);
        return view('sources.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sources.create');
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
            'sname'=>'required',
            'capacity'=> 'required',
            
          ]);
          $source= new Sources([
            'type' => $request->get('type'),
            'sname' => $request->get('sname'),
            'qty'=> $request->get('capacity'),
          ]);
          $source->save();

          return redirect('/source')->with('flash_message', 'New Source has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sources = Sources::findOrFail($id);
        $monthy = Water::all()->where('source',$id);

        return view('sources.show',compact('sources','monthy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Sources::findOrFail($id);

        return view('sources.edit')->withdata($data);
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
            'sname'=>'required',
            'capacity'=> 'required',
            
          ]);
          $source= Sources::find($id);
          $source->type = $request->get('type');
          $source->sname = $request->get('sname');
          $source->qty = $request->get('capacity');
          $source->save();

          return redirect('/source')->with('flash_message', 'Info Has been changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sources = Sources::find($id);
        $sources->delete();
   
        return redirect('/source')->with('flash_message', 'Source has been deleted Successfully');
    }
}
