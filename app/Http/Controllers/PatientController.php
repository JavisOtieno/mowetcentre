<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function index(){

        $patients = Patient::all();
        return view('patient.index', ['patients'=>$patients]);

    }
    public function addPatient() {
        return view('patient.create');
    }

    public function savePatient(Request $request){

        $incomingFields=$request->validate([
            'name'=>'required|string|max:255',
            'id_number'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'gender'=>'required|string|max:255',
            'address'=>'required|string|max:255',
            'date_of_birth'=>'required|date|max:255',
            'age'=>'required|integer|max:150',
            'case_manager'=>'required|string|max:255',
        ]);
        //return $incomingFields;
        //test
        //test


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        //return $incomingFields['usertype'];

        Patient::create($incomingFields);

        return redirect('/patients');

    }
    public function showEditPatient($id){
        $patient = Patient::find($id);
        return view('patient.edit', ['patient'=>$patient]);
    }
    public function saveEditPatient($id, Request $request){


        $incomingFields=$request->validate([

            'name'=>'required|string|max:255',
            'id_number'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'gender'=>'required|string|max:255',
            'address'=>'required|string|max:255',
            'date_of_birth'=>'required|date|max:255',
            'age'=>'required|integer|max:150',
            'case_manager'=>'required|string|max:255',
        ]);


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        $patient=Patient::find($id);

        $patient->update($incomingFields);
        return redirect('/patients');
    }
    public function deletePatient($id){
        $patient = Patient::find($id);
        $patient->delete();
        return redirect('/patients');
    }
}
