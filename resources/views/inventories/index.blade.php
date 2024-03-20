@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Inventories</h1>

    <a href="{{ route('inventories.create') }}" class="btn btn-primary">Add New Inventory</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Quantity in Stock</th>
                <th>Reorder Level</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->id }}</td>
                    <td>{{ $inventory->product_id }}</td>
                    <td>{{ $inventory->quantity_in_stock }}</td>
                    <td>{{ $inventory->reorder_level }}</td>
                    <td>
                        @if($inventory->quantity_in_stock < $inventory->reorder_level)
                            <span class="text-warning">Low Stock</span>
                        @elseif($inventory->quantity_in_stock == 0)
                            <span class="text-danger">Out of Stock</span>
                        @else
                            <span class="text-success">In Stock</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('inventories.edit', $inventory->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

