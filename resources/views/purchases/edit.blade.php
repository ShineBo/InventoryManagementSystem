@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Purchase</div>

                    <div class="card-body">
                        <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="product_id">Product:</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    <!-- Add options for products -->
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" @if ($product->id == $purchase->product_id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="supplier_id">Supplier:</label>
                                <select name="supplier_id" id="supplier_id" class="form-control">
                                    <!-- Add options for suppliers -->
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" @if ($supplier->id == $purchase->supplier_id) selected @endif>{{ $supplier->supplier_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $purchase->quantity }}" required>
                            </div>

                            <div class="form-group">
                                <label for="purchase_date">Purchase Date:</label>
                                <input type="date" name="purchase_date" id="purchase_date" class="form-control" value="{{ $purchase->purchase_date }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="pending" @if ($purchase->status === 'pending') selected @endif>Pending</option>
                                    <option value="fulfilled" @if ($purchase->status === 'fulfilled') selected @endif>Fulfilled</option>
                                    <option value="canceled" @if ($purchase->status === 'canceled') selected @endif>Canceled</option> <!-- Add canceled option -->
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Purchase</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
