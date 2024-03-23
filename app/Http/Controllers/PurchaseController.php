<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Inventory;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('purchases.index', ['purchases' => $purchases]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('purchases.create', ['products' => $products, 'suppliers' => $suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'purchase_date' => 'required|date',
            'status' => 'required|string|in:pending,fulfilled,canceled', // Add 'canceled' status
        ]);

        // Create a new purchase instance
        $purchase = new Purchase();
        $purchase->product_id = $request->product_id;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->quantity = $request->quantity;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->status = $request->status;
        $purchase->save();

        // Redirect back to the purchase index page with a success message
        return redirect()->route('purchases.index')->with('success', 'Purchase added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $purchase = Purchase::find($id);
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('purchases.edit', ['purchase' => $purchase, 'products' => $products, 'suppliers' => $suppliers]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'purchase_date' => 'required|date',
            'status' => 'required|string|in:pending,fulfilled,canceled', // Add 'canceled' status
        ]);

        $purchase = Purchase::find($id);
        $purchase->product_id = $request->product_id;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->quantity = $request->quantity;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->status = $request->status;
        $purchase->save();

        // Check if the status is "fulfilled"
        if ($request->status === 'fulfilled') {
            // Update the product inventory
            $inventory = Inventory::where('product_id', $request->product_id)->first();
            if ($inventory) {
                $inventory->quantity_in_stock += $request->quantity;
                $inventory->save();
            } else {
                // If inventory record doesn't exist, create a new one
                $inventory = new Inventory();
                $inventory->product_id = $request->product_id;
                $inventory->quantity_in_stock = $request->quantity;
                $inventory->reorder_level = 0; // Set a default value for reorder level or fetch it from somewhere else
                $inventory->save();
            }
        }

        return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully.');
    }


    public function destroy(string $id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();

        return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully.');
    }

}
