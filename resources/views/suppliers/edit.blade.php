<!-- resources/views/suppliers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Supplier</h1>
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="supplier_name">Supplier Name:</label>
            <input type="text" name="supplier_name" id="supplier_name" value="{{ $supplier->supplier_name }}" required>
        </div>
        <div>
            <label for="supplier_contact_info">Contact Info:</label>
            <input type="text" name="supplier_contact_info" id="supplier_contact_info" value="{{ $supplier->supplier_contact_info }}" required>
        </div>
        <div>
            <label for="phone_number">Phone</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ $supplier->phone_number }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
