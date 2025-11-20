@extends('admin.layouts.app')

@section('title', 'Search Results')

@section('content')
    <h2>Search Results for: "{{ $query }}"</h2>

    <h4>Users</h4>
    <ul>
        @forelse($users as $user)
            <li>{{ $user->name }} ({{ $user->email }})</li>
        @empty
            <li>No users found.</li>
        @endforelse
    </ul>

    <h4>Sellers</h4>
    <ul>
        @forelse($sellers as $seller)
            <li>{{ $seller->name }}</li>
        @empty
            <li>No sellers found.</li>
        @endforelse
    </ul>

    <h4>Products</h4>
    <ul>
        @forelse($products as $product)
            <li>{{ $product->name }}</li>
        @empty
            <li>No products found.</li>
        @endforelse
    </ul>
@endsection
