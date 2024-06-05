<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Order;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chart;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $startOfMonth = $today->copy()->startOfMonth();
        $endOfMonth = $today->copy()->endOfMonth();

        // Users per day
        $usersPerDay = User::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->get()
            ->pluck('count', 'date');

        // Events per day
        $eventsPerDay = Event::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->get()
            ->pluck('count', 'date');

        // Orders per day
        $ordersPerDay = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->get()
            ->pluck('count', 'date');

        return view('components.welcome', compact('usersPerDay', 'eventsPerDay', 'ordersPerDay'));
    }
}
