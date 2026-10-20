<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Session;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index() {
        $sessionsCount = Session::all()->count();
        $ordersCount = Order::all()->count();
        $usersCount = User::all()->count();
        $counsellorsCount = User::where('usertype', 'counsellor')->count();
        $customersCount = User::where('usertype', 'customer')->count();
        // $orders = Order::all();
        $orders = Order::orderBy('id', 'desc')->take(5)->get();
        $sessions = Session::orderBy('id', 'desc')->take(5)->get();

        $counsellors = User::where('usertype', 'counsellor')->orderBy('id', 'desc')->take(5)->get();
        $customers = User::where('usertype', 'customer')->orderBy('id', 'desc')->take(5)->get();
        

        $days = CarbonPeriod::create(now()->subDays(6), now());

        $ordersGraphCount=[];
        $sessionsGraphCount=[];
        $usersGraphCount=[];
        $counsellorsGraphCount=[];
        $customersGraphCount=[];
        $sessionsWeekCount=0;
        $ordersWeekCount=0;
        $usersWeekCount=0;
        $counsellorsWeekCount=0;
        $customersWeekCount=0;



        $periodStart = now()->subDays(6)->startOfDay();
        $periodEnd   = now()->endOfDay();
        $days = CarbonPeriod::create($periodStart, $periodEnd);

        $sessionsRows = Session::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
        ->whereBetween('created_at', [$periodStart, $periodEnd])
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get()
        ->keyBy('date'); // keys: 'YYYY-MM-DD'

        $ordersRows = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
        ->whereBetween('created_at', [$periodStart, $periodEnd])
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get()
        ->keyBy('date'); // keys: 'YYYY-MM-DD'

        $usersRows = User::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
        ->whereBetween('created_at', [$periodStart, $periodEnd])
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get()
        ->keyBy('date'); // keys: 'YYYY-MM-DD'

        $counsellorsRows = User::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
        ->whereBetween('created_at', [$periodStart, $periodEnd])
        ->where('usertype', 'counsellor')
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get()
        ->keyBy('date'); // keys: 'YYYY-MM-DD'

        $customersRows = User::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
        ->whereBetween('created_at', [$periodStart, $periodEnd])
        ->where('usertype', 'customer')
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get()
        ->keyBy('date'); // keys: 'YYYY-MM-DD'

        foreach ($days as $day) {
            $d = $day->toDateString(); // 'YYYY-MM-DD'

            $sc = isset($sessionsRows[$d])   ? (int)$sessionsRows[$d]->total   : 0;
            $oc = isset($ordersRows[$d])    ? (int)$ordersRows[$d]->total    : 0;
            $uc = isset($usersRows[$d])  ? (int)$usersRows[$d]->total  : 0;
            $cc = isset($counsellorsRows[$d]) ? (int)$counsellorsRows[$d]->total : 0;
            $custc = isset($customersRows[$d]) ? (int)$customersRows[$d]->total : 0;

            $ordersGraphCount[]   = $sc;
            $sessionsGraphCount[] = $oc;
            $usersGraphCount[]= $uc;
            $counsellorsGraphCount[]= $cc;
            $customersGraphCount[]= $custc;

            $ordersWeekCount  += $oc;
            $sessionsWeekCount   += $sc;
            $usersWeekCount += $uc;
            $counsellorsWeekCount += $cc;
            $customersWeekCount += $custc;
        }

        return view('dashboard.index', compact('sessionsCount', 'ordersCount',
         'usersCount', 'orders', 'sessions', 'sessionsWeekCount','counsellors','customers', 
         'ordersWeekCount', 'usersWeekCount', 'counsellorsWeekCount', 'customersWeekCount',
         'counsellorsCount','customersCount','ordersGraphCount','sessionsGraphCount','usersGraphCount'));
    }
}
