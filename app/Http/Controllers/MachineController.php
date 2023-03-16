<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {

        $machines = Machine::all();
        $rooms = Salle::all();
        return view("machine", [
            'machines' => $machines,
            'rooms' => $rooms
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'reference' => 'required|integer',
            'brand' => 'required|min:10|max:20',
            'price' => 'required|integer',
            'roomid' => 'required|integer',
        ]);


        // Creating the Salle in the database
        Machine::create([
            'reference' => $request->reference,
            'brand' => $request->brand,
            'buydate' => $request->buydate,
            'price' => $request->price,
            'roomid' => $request->roomid,
        ]);

        // Redirecting to the Room page
        return redirect(route('machine'));
    }
    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);
        $machine->delete();
        return redirect()->back();
    }
}