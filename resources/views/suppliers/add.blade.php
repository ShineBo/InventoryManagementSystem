<!-- resources/views/suppliers/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Supplier</h1>
    <form action="{{ route('suppliers.store') }}" method="post">
        @csrf
        <div>
            <label for="supplier_name">Supplier Name:</label>
            <input type="text" name="supplier_name" id="supplier_name" required>
        </div>
        <div>
            <label for="supplier_contact_info">Contact Info:</label>
            <input type="text" name="supplier_contact_info" id="supplier_contact_info" required>
        </div>
        <div>
            <label for="phone_number">Phone</label>
            <input type="text" name="phone_number" id="phone_number" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
