@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
            @if(Auth::check() && Auth::user()->isAdmin())
            <div class="container mt-5">
                <div class=" row">
                    <div class="dropdown col">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="productsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products
                        </button>
                        <div class="dropdown-menu" aria-labelledby="productsDropdown">
                            <a class="dropdown-item" href="{{ route('products.index') }}">View Products</a>
                            <a class="dropdown-item" href="{{ route('products.create') }}">Add Product</a>
                        </div>
                    </div>
                    <div class="dropdown col">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="productsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Suppliers
                        </button>
                        <div class="dropdown-menu" aria-labelledby="productsDropdown">
                        <a class="dropdown-item" href="{{ route('suppliers.index') }}">View Suppliers</a>
                        <a class="dropdown-item" href="{{ route('suppliers.create') }}">Add Supliers</a>
                        </div>
                    </div>
                    <div class="dropdown col">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="productsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Inventories
                        </button>
                        <div class="dropdown-menu" aria-labelledby="productsDropdown">
                        <a class="dropdown-item" href="{{ route('inventories.index') }}">View Inventories</a>
                        <a class="dropdown-item" href="{{ route('inventories.create') }}">Add Inventory</a>
                        </div>
                    </div>
                    <div class="dropdown col">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="productsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Customers
                        </button>
                        <div class="dropdown-menu" aria-labelledby="productsDropdown">
                        <a class="dropdown-item" href="{{ route('customers.index') }}">View Customers</a>
                        <a class="dropdown-item" href="{{ route('customers.create') }}">Add Customer</a>
                        </div>
                    </div>
                    <div class="dropdown col">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="productsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Orders
                        </button>
                        <div class="dropdown-menu" aria-labelledby="productsDropdown">
                        <a class="dropdown-item" href="{{ route('orders.index') }}">View Orders</a>
                        <a class="dropdown-item" href="{{ route('orders.create') }}">Add Order</a>
                        </div>
                    </div>
                    <div class="dropdown col">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="productsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Purchases
                        </button>
                        <div class="dropdown-menu" aria-labelledby="productsDropdown">
                        <a class="dropdown-item" href="{{ route('purchases.index') }}">View Purchases</a>
                        <a class="dropdown-item" href="{{ route('purchases.create') }}">Add Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h2>Pending Orders</h2>
                        @if ($pendingOrders->isEmpty())
                            <p>No pending orders.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingOrders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->customer->name }}</td>
                                            <td>{{ $order->product->name }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>$ {{ $order->total_price }}</td> <!-- Display total price -->
                                            <td>{{ ucfirst($order->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <h2>Stocks</h2>
                        @if ($stocks->isEmpty())
                            <p>No stocks available.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Quantity in Stock</th>
                                        {{-- <th>Reorder Level</th> --}}
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                            <td>{{ $stock->product_id }}</td>
                                            <td>{{ $stock->product->name }}</td>
                                            <td>{{ $stock->quantity_in_stock }}</td>
                                            {{-- <td>{{ $stock->reorder_level }}</td> --}}
                                            <td>
                                                @if($stock->quantity_in_stock < $stock->reorder_level)
                                                    <span class="text-warning">Low Stock</span>
                                                @elseif($stock->quantity_in_stock == 0)
                                                    <span class="text-danger">Out of Stock</span>
                                                @else
                                                    <span class="text-success">In Stock</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
