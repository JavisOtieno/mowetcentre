<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $sessionsCount = Session::all()->count();
        $ordersCount = Order::all()->count();
        $usersCount = User::all()->count();
        // $orders = Order::all();
        $orders = Order::orderBy('id', 'desc')->take(5)->get();
        $sessions = Session::orderBy('id', 'desc')->take(5)->get();
        $sessionsWeekCount=0;
        return view('dashboard.index', compact('sessionsCount', 'ordersCount',
         'usersCount', 'orders', 'sessions', 'sessionsWeekCount'));
    }
}
