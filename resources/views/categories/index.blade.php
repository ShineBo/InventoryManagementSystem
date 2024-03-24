@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create Category</a>
        @if ($categories->isEmpty())
            <p>No categories found.</p>
        @else
            <ul class="list-group">
                @foreach ($categories as $category)
                    <li class="list-group-item">{{ $category->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
