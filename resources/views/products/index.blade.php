@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Supplier</th> <!-- Add Supplier column header -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->supplier->supplier_name ?? 'N/A' }}</td> <!-- Display supplier name or 'N/A' if no supplier -->
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                        {{-- <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
