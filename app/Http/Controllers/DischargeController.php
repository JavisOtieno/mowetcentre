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
    public function showEditDischarge($id){
        $discharge = Discharge::find($id);
        $patients = Patient::all();
        return view('discharge.edit',['discharge'=>$discharge, 'patients'=>$patients]);
    }
    public function saveEditDischarge($id, Request $request){

        $incomingFields=$request->validate([
            'notes'=>'required|string|max:255',
            'patient_id'=>'required|integer|exists:patients,id',
        ]);


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        $discharge=Discharge::find($id);

        $discharge->update($incomingFields);
        return redirect('/discharges');
    }
    
    public function deleteDischarge($id){
        $discharge = Discharge::find($id);
        $discharge->delete();
        return redirect('/discharges');
    }
}
