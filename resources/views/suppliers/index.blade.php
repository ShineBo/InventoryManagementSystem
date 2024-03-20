<!-- resources/views/suppliers/index.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout template -->

@section('content')
    <h1>Suppliers</h1>

    <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Add New Supplier</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact Info</th>
                <th>Phone Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->supplier_name }}</td>
                    <td>{{ $supplier->supplier_contact_info }}</td>
                    <td>{{ $supplier->phone_number }}</td>
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
