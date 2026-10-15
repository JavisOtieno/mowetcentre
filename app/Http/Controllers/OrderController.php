<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){

        $orders = Order::all();

        return view('order.index', ['orders'=>$orders]);
    }
    public function addOrder() {
        $customers = User::all();
        return view('order.create', compact('customers'));
    }

    public function saveOrder(Request $request){

        $incomingFields=$request->validate([
            'description'=>'required|string|max:255',
            'customer_id'=>'required|integer|exists:users,id',
        ]);
        //return $incomingFields;
        //test
        //test


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        //return $incomingFields['usertype'];

        Order::create($incomingFields);

        return redirect('/orders');

    }

     public function showEditOrder($id){
        $order = Order::find($id);
        $customers = User::all();
        return view('order.edit',['order'=>$order, 'customers'=>$customers]);
    }
    public function saveEditOrder($id, Request $request){

        $incomingFields=$request->validate([
            'description'=>'required|string|max:255',
            'customer_id'=>'required|integer|exists:users,id',
        ]);


        // $incomingFields['name']=strip_tags($incomingFields['name']);

        $order=Order::find($id);

        $order->update($incomingFields);

        return redirect('/orders');
    }
    
    public function deleteOrder($id){
        $order = Order::find($id);
        $order->delete();
        return redirect('/orders');
    }
}
