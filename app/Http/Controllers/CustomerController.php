<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::with('user')->get(); // Assuming you have a relationship defined for the user
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'location' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'required|email|unique:customers,email',
        ]);

        // Create a new customer instance
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->location = $request->location;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->save();

        // Redirect back to the customer index page with a success message
        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'location' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
        ]);

        // Update the customer instance
        $customer->name = $request->name;
        $customer->location = $request->location;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->save();

        // Redirect back to the customer index page with a success message
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // Redirect back to the customer index page with a success message
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
