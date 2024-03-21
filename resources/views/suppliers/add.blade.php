@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Supplier</h1>
        <form action="{{ route('suppliers.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="supplier_name" class="form-label">Supplier Name:</label>
                <input type="text" name="supplier_name" id="supplier_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="supplier_contact_info" class="form-label">Contact Info:</label>
                <input type="text" name="supplier_contact_info" id="supplier_contact_info" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
