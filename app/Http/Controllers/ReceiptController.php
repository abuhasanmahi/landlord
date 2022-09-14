<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flat;
use App\Models\Tenant;
use App\Models\Receipt;
use DB;

class ReceiptController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('receipt/index');
    }

    public function generate(Request $request)
    {
        $this->validate($request, [
            'month' => 'required',
            'year' => 'required',
        ]);

        $month = $request->input('month');
        $year = $request->input('year');
        $receipt_size = $request->input('receipt_size');

        $tenant_count = DB::table('tenants')
        ->select('tenants.id','tenants.name','tenants.flat_id','flats.flat_name','flats.rent','flats.electricity_bill','flats.water_bill','flats.gas_bill','flats.trash_van')
        ->join('flats', 'tenants.flat_id', '=', 'flats.id')
        ->where('flats.user_id', '=', auth()->user()->id)
        ->get()->count();

        if($tenant_count > 0){
            $tenant = DB::table('tenants')
            ->select('tenants.id','tenants.name','tenants.flat_id','flats.flat_name','flats.rent','flats.electricity_bill','flats.water_bill','flats.gas_bill','flats.trash_van')
            ->join('flats', 'tenants.flat_id', '=', 'flats.id')
            ->where('flats.user_id', '=', auth()->user()->id)
            ->get();

            foreach($tenant as $tenants){
                $receipt_count = Receipt::where('flat_name', $tenants->flat_name)
                ->where('month', $month)
                ->where('year', $year)
                ->get()->count();

                if($receipt_count > 0){
                    //return view('receipt/generate');
                }else{
                    //Generate Receipt
                    $receipt = New Receipt();
                    $receipt->month = $month;
                    $receipt->year = $year;
                    $receipt->name = $tenants->name;
                    $receipt->flat_name = $tenants->flat_name;
                    $receipt->rent = $tenants->rent;
                    $receipt->electricity_bill = $tenants->electricity_bill;
                    $receipt->water_bill = $tenants->water_bill;
                    $receipt->gas_bill = $tenants->gas_bill;
                    $receipt->trash_van = $tenants->trash_van;
                    $receipt->flat_id = $tenants->trash_van;
                    $receipt->user_id = auth()->user()->id;
                    $receipt->save();
                }
            }
            $receipt = Receipt::where('user_id', auth()->user()->id)
            ->where('month', $month)
            ->where('year', $year)
            ->get();

            if($receipt_size == 0){
                return view('receipt/generate')->with('receipt', $receipt);
            }else{
                return view('receipt/generate2')->with('receipt', $receipt);
            }
        }else{
            return redirect('/receipt')->with('error', 'No Data Found');
        }
    }
}
