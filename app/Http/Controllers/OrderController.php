<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create', ['customers' => $customers, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'nullable|in:shipped,pending,canceled', // Validate status
        ]);

        // Retrieve the inventory for the requested product
        $inventory = Inventory::where('product_id', $request->product_id)->first();

        // Check if the requested quantity exceeds the available stock
        if ($inventory && $request->quantity > $inventory->quantity_in_stock) {
            throw ValidationException::withMessages([
                'quantity' => 'The requested quantity exceeds the available stock.',
            ]);
        }

        // Create a new order instance
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        $order->save();

        // If order was successfully created, update inventory
        if ($order->exists) {
            // Update inventory quantity
            $inventory->quantity_in_stock -= $request->quantity;
            $inventory->save();
        }

        // Redirect back to the order index page with a success message
        return redirect()->route('orders.index')->with('success', 'Order added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.edit', ['order' => $order, 'customers' => $customers, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Retrieve the order
        $order = Order::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'nullable|in:shipped,pending,canceled', // Validate status
        ]);

        // Retrieve the inventory for the requested product
        $inventory = Inventory::where('product_id', $request->product_id)->first();

        // Check if the requested quantity exceeds the available stock
        if ($inventory && $request->quantity > $inventory->quantity_in_stock) {
            throw ValidationException::withMessages([
                'quantity' => 'The requested quantity exceeds the available stock.',
            ]);
        }

        // Update the order instance
        $order->customer_id = $request->customer_id;
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        $order->status = $request->status; // Update status
        $order->save();

        // Redirect back to the order index page with a success message
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        // Redirect back to the order index page with a success message
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}

