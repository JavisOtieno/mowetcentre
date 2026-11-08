<?php

namespace App\Http\Controllers;

use App\Models\Counsellor;
use Illuminate\Http\Request;

class CounsellorController extends Controller
{
    //
     public function index(){
        $counsellors = Counsellor::all();
        return view('counsellor.index', ['counsellors'=>$counsellors]);
    }
     public function addCounsellor() {
        return view('counsellor.create');
    }

    public function saveCounsellor(Request $request){

        $incomingFields=$request->validate([
            'name'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'email'=>'required|email|max:255',
        ]);
        //return $incomingFields;
        //test
        //test


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        //return $incomingFields['usertype'];

        Counsellor::create($incomingFields);

        return redirect('/counsellors');

    }
    public function showEditCounsellor($id){
        $counsellor = Counsellor::find($id);
        return view('counsellor.edit', ['counsellor'=>$counsellor]);
    }
    public function saveEditCounsellor($id, Request $request){


        $incomingFields=$request->validate([

            'name'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'email'=>'required|email|max:255',
        ]);


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        $counsellor=Counsellor::find($id);

        $counsellor->update($incomingFields);
        return redirect('/counsellors');
    }
    public function deleteCounsellor($id){
        $counsellor = Counsellor::find($id);
        $counsellor->delete();
        return redirect('/counsellors');
    }
}
