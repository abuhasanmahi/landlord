<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flat;
use App\Models\Tenant;
use DB;

class TenantController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$tenant = Tenant::where('user_id', auth()->user()->id)->get();
        return view('tenant/index')->with('tenant', $tenant);*/

        $tenant = DB::table('tenants')
        ->select('tenants.id','tenants.name','tenants.flat_id','flats.flat_name','flats.rent')
        ->join('flats', 'tenants.flat_id', '=', 'flats.id')
        ->where('flats.user_id', '=', auth()->user()->id)
        ->get();

        return view('tenant/index', compact('tenant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flat = Flat::where('user_id', auth()->user()->id)->get();
        return view('tenant/create')->with('flat', $flat);
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
            'name' => 'required',
            'flat_id' => 'required',
        ]);
       
        //Create tenant
        $tenant = New Tenant();
        $tenant->name = $request->input('name');
        $tenant->email = $request->input('email');
        $tenant->mobile = $request->input('mobile');
        $tenant->flat_id = $request->input('flat_id');
        $tenant->user_id = auth()->user()->id;
        $tenant->save();
  
        return redirect('/tenant')->with('success', 'Data Inserted Successfully');
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
        $tenant = Tenant::find($id);
        if(!$tenant->ownedBy(auth()->user())){
            return redirect('/tenant')->with('error', 'You are not authorized to Edit');            
        }else{
            return view('tenant/edit')->with('tenant', $tenant);
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
            'name' => 'required',
        ]);
       
        //Update tenant
        $tenant = Tenant::find($id);
        $tenant->name = $request->input('name');
        $tenant->email = $request->input('email');
        $tenant->mobile = $request->input('mobile');
        $tenant->save();
  
        return redirect('/tenant')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tenant = Tenant::find($id);
        if(!$tenant->ownedBy(auth()->user())){
            return redirect('/tenant')->with('error', 'You are not authorized to Delete');            
        }else{
            $tenant->delete();
            return redirect('/tenant')->with('success', 'Data Deleted Successfully');
        }
    }
}
