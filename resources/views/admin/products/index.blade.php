@extends('admin.layouts.app')

@section('title', 'All Products')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>🛒 All Products</h3>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">➕ Add Product</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" width="60" class="rounded">
                        @else
                            <img src="{{ asset('images/no-image.png') }}" width="60" class="rounded">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->category ? $product->category->name : 'addidas' }}</td>
                    <td>{{ $product->brand ? $product->brand->name : 'savi' }}</td>
                    <td>₹{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ ucfirst($product->type) }}</td>
                    <td>
                        <span class="badge {{ $product->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($product->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">🗑️</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center">No products found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $products->links() }}
</div>
@endsection
