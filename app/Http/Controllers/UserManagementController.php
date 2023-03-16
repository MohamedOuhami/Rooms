<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    function showTable(){

        if(auth()->user()->role=="superadmin"){
            $users=User::where('role', '!=', 'superadmin')->get();
            return view("user-management",compact('users'));
        }
        return redirect()->back();
    }

    function delete($id){
        if(auth()->user()->role=="superadmin"){
            
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->back();
        }
        return redirect()->back();

    }
    public function update_status($id){
        if(auth()->user()->role=="superadmin"){
            $user = User::findOrFail($id);
            if($user->status=="Disable"){
                $user->status="disabled";
                $user->save();
            }
            else{
                $user->status="enabled";
                $user->save();
            }
        }
        return redirect()->back();
    }
}
