@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Inventory</h1>

    <form action="{{ route('inventories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="product_id">Product</label>
            <select class="form-control" id="product_id" name="product_id" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity_in_stock">Quantity in Stock</label>
            <input type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" required>
        </div>

        <div class="form-group">
            <label for="reorder_level">Reorder Level</label>
            <input type="number" class="form-control" id="reorder_level" name="reorder_level" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Inventory</button>
    </form>
</div>
@endsection
