<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){

        $orders = Order::all();

        return view('order.index', ['orders'=>$orders]);
    }
    public function addOrder() {
        return view('order.create');
    }

    public function saveOrder(Request $request){

        $incomingFields=$request->validate([
            'description'=>'required|string|max:255',
            'counsellor_id'=>'required|integer|exists:users,id',
        ]);
        //return $incomingFields;
        //test
        //test


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        //return $incomingFields['usertype'];

        Order::create($incomingFields);

        return redirect('/orders');

    }
}
