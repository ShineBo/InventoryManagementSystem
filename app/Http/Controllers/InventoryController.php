<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventories.index', ['inventories' => $inventories]);
    }

    public function create()
    {
        $products = Product::all(); // Fetch all products
        return view('inventories.create', ['products' => $products]); // Pass products to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity_in_stock' => 'required|integer',
            'reorder_level' => 'required|integer',
        ]);

        $inventory = new Inventory();
        $inventory->product_id = $request->product_id;
        $inventory->quantity_in_stock = $request->quantity_in_stock;
        $inventory->reorder_level = $request->reorder_level;
        $inventory->save();

        return redirect()->route('inventories.index')->with('success', 'Inventory added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $inventory = Inventory::findOrFail($id); // Find the inventory record
        $products = Product::all(); // Fetch all products
        return view('inventories.edit', ['inventory' => $inventory, 'products' => $products]); // Pass inventory and products to the view
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity_in_stock' => 'required|integer',
            'reorder_level' => 'required|integer',
        ]);

        $inventory = Inventory::find($id);
        $inventory->product_id = $request->product_id;
        $inventory->quantity_in_stock = $request->quantity_in_stock;
        $inventory->reorder_level = $request->reorder_level;
        $inventory->save();

        return redirect()->route('inventories.index')->with('success', 'Inventory updated successfully.');
    }

    public function destroy(string $id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();

        return redirect()->route('inventories.index')->with('success', 'Inventory deleted successfully.');
    }
}

