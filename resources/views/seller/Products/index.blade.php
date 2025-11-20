@extends('seller.layouts.app')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">All Products</h4>
        <div>
            <a href="{{ route('seller.products.create') }}" class="btn btn-success me-2">
                <i class="bi bi-plus-circle"></i> Add Product
            </a>
            <a href="{{ route('seller.products.outOfStock') }}" class="btn btn-outline-danger">
                <i class="bi bi-exclamation-triangle"></i> Out of Stock
            </a>
        </div>
    </div>

    {{-- Products Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>SKU</th>
                    <th>Price (₹)</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        {{-- ✅ Product Image --}}
                        <td>
                            @php
                                $imagePath = $product->image
                                    ? (Str::startsWith($product->image, 'products/')
                                        ? asset('storage/' . $product->image)
                                        : asset('storage/products/' . $product->image))
                                    : asset('images/default-product.png');
                            @endphp

                            <img src="{{ $imagePath }}" width="60" height="60" class="rounded border" alt="{{ $product->name }}">
                        </td>

                        {{-- Product Name --}}
                        <td>{{ $product->name }}</td>

                        {{-- Description --}}
                        <td>
                            <span title="{{ $product->description }}">
                                {{ Str::limit($product->description, 50) }}
                            </span>
                        </td>

                        {{-- SKU --}}
                        <td>{{ $product->sku }}</td>

                        {{-- Price --}}
                        <td>₹{{ number_format($product->price, 2) }}</td>

                        {{-- Stock --}}
                        <td>
                            @if($product->stock > 0)
                                <span class="badge bg-success">{{ $product->stock }}</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </td>

                        {{-- Status --}}
                        <td>
                            <span class="badge {{ $product->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </td>

                        {{-- Featured --}}
                        <td>
                            <span class="badge {{ $product->is_featured ? 'bg-warning text-dark' : 'bg-secondary' }}">
                                {{ $product->is_featured ? 'Yes' : 'No' }}
                            </span>
                        </td>

                        {{-- Actions --}}
                        <td>
                            <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted py-4">
                            <i class="bi bi-box"></i> No products found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-3">
            {{ $products->links() }}
        </div>
    </div>

</div>
@endsection
