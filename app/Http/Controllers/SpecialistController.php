<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    //
      public function index(){
        $specialists = Specialist::all();
        return view('specialist.index', ['specialists'=>$specialists]);
    }
     public function addSpecialist() {
        return view('specialist.create');
    }

    public function saveSpecialist(Request $request){

        $incomingFields=$request->validate([
            'name'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'field'=>'required|string|max:255',
        ]);
        //return $incomingFields;
        //test
        //test


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        //return $incomingFields['usertype'];

        Specialist::create($incomingFields);

        return redirect('/specialists');

    }
    public function showEditSpecialist($id){
        $specialist = Specialist::find($id);
        return view('specialist.edit', ['specialist'=>$specialist]);
    }
    public function saveEditSpecialist($id, Request $request){


        $incomingFields=$request->validate([

            'name'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'field'=>'required|string|max:255',
        ]);


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        $specialist=Specialist::find($id);

        $specialist->update($incomingFields);
        return redirect('/specialists');
    }
    public function deleteSpecialist($id){
        $specialist = Specialist::find($id);
        $specialist->delete();
        return redirect('/specialists');
    }
}
