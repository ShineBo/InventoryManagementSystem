@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Orders</div>

                    <div class="card-body">
                        {{-- <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Add Order</a> --}}

                        @if ($orders->isEmpty())
                            <p>No orders found.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th> <!-- New column -->
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->customer->name }}</td>
                                            <td>{{ $order->product->name }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>$ {{ $order->total_price }}</td> <!-- Display total price -->
                                            <td>{{ ucfirst($order->status) }}</td>
                                            <td>
                                                @if ($order->status !== 'shipped' && $order->status !== 'canceled')
                                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    {{-- <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                                    </form> --}}
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
        </div>
    </div>
@endsection


