<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Inventory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Fetch pending orders
        $pendingOrders = Order::where('status', 'pending')->get();

        // Fetch stocks from inventories
        $stocks = Inventory::all();

        return view('home', ['pendingOrders' => $pendingOrders, 'stocks' => $stocks]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
}
