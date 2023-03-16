<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($request->only('email','password'))){
           if(auth()->user()->status=="Disable"){

                if(auth()->user()->role=="admin"){
                    return redirect()->route('dashboard');
                }
                else{
                    return redirect()->route('user-management');
                }

           }else{
                auth()->logout();
                return redirect()->back()->with('status','Your Account is disabled');
           }
        }
        
        return redirect()->back()->with('status','Invalid Login');

    }
}
