@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Supplier</h1>
        <form action="{{ route('suppliers.update', $supplier->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="supplier_name" class="form-label">Supplier Name:</label>
                <input type="text" name="supplier_name" id="supplier_name" value="{{ $supplier->supplier_name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="supplier_contact_info" class="form-label">Contact Info:</label>
                <input type="text" name="supplier_contact_info" id="supplier_contact_info" value="{{ $supplier->supplier_contact_info }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone</label>
                <input type="text" name="phone_number" id="phone_number" value="{{ $supplier->phone_number }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

