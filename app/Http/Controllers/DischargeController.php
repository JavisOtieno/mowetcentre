<?php

namespace App\Http\Controllers;

use App\Models\Discharge;
use App\Models\Patient;
use Illuminate\Http\Request;

class DischargeController extends Controller
{
    //
    public function index(){
        $discharges = Discharge::all();
        return view('discharge.index', ['discharges'=>$discharges]);
    }
    public function addDischarge() {
        $patients = Patient::all();
        return view('discharge.create', compact('patients'));
    }
    public function saveDischarge(Request $request){

        $incomingFields=$request->validate([
            'notes'=>'required|string|max:255',
            'patient_id'=>'required|integer|exists:patients,id',
        ]);
     

        Discharge::create($incomingFields);

        return redirect('/discharges');

    }
}
