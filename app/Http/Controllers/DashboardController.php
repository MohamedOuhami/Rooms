<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salle;
use App\Models\Machine;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $machines = Machine::all();
        $salles = Salle::all();
        $users = User::all();
        return view('dashboard',[
            'machines' => $machines,
            'salles' => $salles,
            'users' => $users,
        ]);
    }
}
