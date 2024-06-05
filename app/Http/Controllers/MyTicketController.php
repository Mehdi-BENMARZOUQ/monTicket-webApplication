<?php

namespace App\Http\Controllers;

use App\Models\MyTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyTicketController extends Controller
{
    public function index()
    {
        $tickets = MyTicket::where('user_id', Auth::id())->get();
        return view('myTickets.index', compact('tickets'));
    }
}
