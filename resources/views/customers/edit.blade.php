<!-- resources/views/customers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Customer</div>

                    <div class="card-body">
                        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" name="location" id="location" class="form-control" value="{{ $customer->location }}">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $customer->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $customer->email }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Customer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
