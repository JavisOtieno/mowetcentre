<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index(){
        $clients = Client::all();
        return view('client.index', ['clients'=>$clients]);
    }
     public function addClient() {
        return view('client.create');
    }

    public function saveClient(Request $request){

        $incomingFields=$request->validate([
            'name'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'notes'=>'required|string|max:2000',
        ]);
        //return $incomingFields;
        //test
        //test


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        //return $incomingFields['usertype'];

        Client::create($incomingFields);

        return redirect('/clients');

    }
    public function showEditClient($id){
        $client = Client::find($id);
        return view('client.edit', ['client'=>$client]);
    }
    public function saveEditClient($id, Request $request){


        $incomingFields=$request->validate([

            'name'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'notes'=>'required|string|max:2000',
        ]);


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        $client=Client::find($id);

        $client->update($incomingFields);
        return redirect('/clients');
    }
    public function deleteClient($id){
        $client = Client::find($id);
        $client->delete();
        return redirect('/clients');
    }

}
