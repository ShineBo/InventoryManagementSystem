<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Inventory;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user's ID
            $userId = Auth::id();

            // Check if the user is not an admin
            if (!Auth::user()->isAdmin()) {
                // Check if the user has a customer profile
                if (!Customer::where('user_id', $userId)->exists()) {
                    // Redirect the user to create a customer profile
                    return redirect()->route('customers.create')->with('warning', 'Please create a customer profile to view orders.');
                }
            }

            // Fetch orders associated with the authenticated user's ID
            $userOrders = Order::whereHas('customer.user', function ($query) use ($userId) {
                $query->where('id', $userId);
            })->get();

            // Check if orders were fetched
            if ($userOrders->isEmpty()) {
                // Add a warning message for no orders found for the user
                session()->flash('warning', 'No orders found for this user.');
            }
        } else {
            // If the user is not authenticated, initialize $userOrders as an empty collection
            $userOrders = collect();
        }

        // Return the view with all necessary data
        return view('home', [
            'pendingOrders' => $pendingOrders,
            'stocks' => $stocks,
            'userOrders' => $userOrders,
        ]);
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
