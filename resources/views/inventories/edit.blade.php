@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Inventory</h1>

    <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="product_id">Product</label>
            <select class="form-control" id="product_id" name="product_id" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $inventory->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity_in_stock">Quantity in Stock</label>
            <input type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" value="{{ $inventory->quantity_in_stock }}" required>
        </div>

        <div class="form-group">
            <label for="reorder_level">Reorder Level</label>
            <input type="number" class="form-control" id="reorder_level" name="reorder_level" value="{{ $inventory->reorder_level }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Inventory</button>
    </form>
</div>
@endsection

