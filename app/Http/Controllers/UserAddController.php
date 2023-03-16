<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAddController extends Controller

{

    function __construct(){
        $this->middleware('auth');
    }
    public function showForm(){

        return view('user_add');

    }

    public function storeUser(Request $request ){
        $this->validate($request,[
            'username' => 'required|min:5|max:20',
            'fullname' => 'required|min:5|max:20',
            'email' => 'required|email|max:30',
            'password' => 'required|min:10|max:20|confirmed'
        ]);

        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('status','User added succesfully');

    }
}
