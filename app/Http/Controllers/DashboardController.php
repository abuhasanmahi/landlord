<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flat;
use App\Models\Tenant;
use App\Models\Receipt;
use DB;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        $flat = Flat::where('user_id', auth()->user()->id)->get()->count();
        $tenant = Tenant::where('user_id', auth()->user()->id)->get()->count();
        $receipt = Receipt::where('user_id', auth()->user()->id)->get()->count();
        return view('dashboard')->with('flat', $flat)->with('tenant', $tenant)->with('receipt', $receipt);
    }
}
