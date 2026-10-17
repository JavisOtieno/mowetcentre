<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Session;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $sessionsCount = Session::all()->count();
        $ordersCount = Order::all()->count();
        $orders = Order::all();
        $sessionsWeekCount=0;
        return view('dashboard.index', compact('sessionsCount', 'ordersCount',
        'orders', 'sessionsWeekCount'));
    }
}
