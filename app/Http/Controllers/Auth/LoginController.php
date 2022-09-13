<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        //validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //sign the user in
        if(!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid');
        }
        //redirect
        return redirect()->route('dashboard');
    }

}
