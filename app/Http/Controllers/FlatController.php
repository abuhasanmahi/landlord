<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flat;

class FlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flat = Flat::where('user_id', auth()->user()->id)->get();
        return view('flat/index')->with('flat', $flat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flat/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'flat_name' => 'required',
            'rent' => 'required',
        ]);
       
        //Create Flat
        $flat = New Flat();
        $flat->flat_name = $request->input('flat_name');
        $flat->rent = $request->input('rent');
        $flat->electricity_bill = $request->input('electricity_bill');
        $flat->water_bill = $request->input('water_bill');
        $flat->gas_bill = $request->input('gas_bill');
        $flat->trash_van = $request->input('trash_van');
        $flat->user_id = auth()->user()->id;
        $flat->save();
  
        return redirect('/flat')->with('success', 'Data Inserted Successfully');
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
        $flat = Flat::find($id);
        if(!$flat->ownedBy(auth()->user())){
            return redirect('/flat')->with('error', 'You are not authorized to Edit');            
        }else{
            return view('flat/edit')->with('flat', $flat);
        }
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
        $this->validate($request, [
            'flat_name' => 'required',
            'rent' => 'required',
        ]);
       
        //Update Flat
        $flat = Flat::find($id);
        $flat->flat_name = $request->input('flat_name');
        $flat->rent = $request->input('rent');
        $flat->electricity_bill = $request->input('electricity_bill');
        $flat->water_bill = $request->input('water_bill');
        $flat->gas_bill = $request->input('gas_bill');
        $flat->trash_van = $request->input('trash_van');
        $flat->save();
  
        return redirect('/flat')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flat = Flat::find($id);
        if(!$flat->ownedBy(auth()->user())){
            return redirect('/flat')->with('error', 'You are not authorized to Delete');            
        }else{
            $flat->delete();
            return redirect('/flat')->with('success', 'Data Deleted Successfully');
        }
    }
}
