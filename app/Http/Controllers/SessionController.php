<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
        public function index(){

        $sessions = Session::all();
        // test
        // $trips = Trip::with('locations')
        //     ->where(function ($query) {
        //         $query->where('status', '!=', 'order')
        //             ->orWhereNull('status');
        //     })
        // ->withSum('locations', 'distance')->orderBy('created_at', 'desc')->get();
        // $tripselected = Trip::with('locations')->find(19);

        // $locations = Location::where('trip_id','19')
        // ->orderBy('created_at', 'asc')
        // ->get();

        // $totalDistance = 0;

        return view('session.index', ['sessions'=>$sessions]);
    }

    public function addSession() {
        $counsellors = User::all();
        return view('session.create', compact('counsellors'));
    }

    public function saveSession(Request $request){

        $incomingFields=$request->validate([
            'title'=>'required|string|max:255',
            'mode'=>'required|string|max:255',
            'counsellor_id'=>'required|integer|exists:users,id',
        ]);
        //return $incomingFields;
        //test
        //test


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        //return $incomingFields['usertype'];

        Session::create($incomingFields);

        return redirect('/sessions');

    }
    public function showEditSession($id){
        $session = Session::find($id);
        $counsellors = User::all();
        return view('session.edit',['session'=>$session, 'counsellors'=>$counsellors]);
    }
    public function saveEditSession($id, Request $request){

        $incomingFields=$request->validate([
            'title'=>'required|string|max:255',
            'mode'=>'required|string|max:255',
            'counsellor_id'=>'required|integer|exists:users,id',
        ]);


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        $session=Session::find($id);

        $session->update($incomingFields);

        return redirect('/sessions');
    }
    
    public function deleteSession($id){
        $session = Session::find($id);
        $session->delete();
        return redirect('/sessions');
    }

}
