<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SalleController extends Controller
{
    public function index()
    {

        $salles = Salle::all();
        return view('room', [
            'salles' => $salles
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|min:5|max:15',
            'label' => 'required|min:10|max:20'
        ]);


        // Creating the Salle in the database
        Salle::create([
            'code' => $request->code,
            'label' => $request->label
        ]);

        // Redirecting to the Room page
        return redirect(route('room'));
    }

    public function destroy($id)
    {
        $room = Salle::findOrFail($id);
        $room->delete();
        return redirect()->back();
    }

}