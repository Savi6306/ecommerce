@extends('admin.layouts.app')

@section('content')
<h1>Vendor Products</h1>
<a href="{{ route('admin.vendor_products.create') }}" class="btn btn-primary mb-3">Add Product</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Vendor</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Price</th>
            <th>Main Image</th>
            <th>Status</th>
            <th>Approval</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->vendor->store_name ?? 'N/A' }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->sku }}</td>
            <td>₹{{ number_format($product->price, 2) }}</td>
            <td>
                @if($product->thumbnail)
                    <img src="{{ asset('storage/'.$product->thumbnail) }}" width="60" height="60" style="object-fit:cover;">
                @endif
            </td>
            <td><span class="badge bg-info">{{ ucfirst($product->status) }}</span></td>
            <td><span class="badge bg-warning">{{ ucfirst($product->approval_status) }}</span></td>
            <td>
                <a href="{{ route('admin.vendor_products.edit', $product->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                
                <a href="{{ route('admin.vendor_products.gallery.index', $product->id) }}" class="btn btn-sm btn-info mb-1">Gallery</a>

                <form action="{{ route('admin.vendor_products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf 
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" class="text-center">No products found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{-- Pagination --}}
<div class="mt-3">
    {{ $products->links() }}
</div>
@endsection
