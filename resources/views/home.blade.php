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
            @endif
        </div>
    </div>
</div>
@endsection
