@extends('seller.layouts.app')

@section('content')
<div class="container-fluid py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📦 Out of Stock Products</h2>
        <a href="{{ route('seller.products.create') }}" class="btn btn-success">+ Add New Product</a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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

                    {{-- Product Image --}}
                    <td>
                        <img 
                            src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/default-product.png') }}" 
                            width="50" 
                            class="rounded"
                            alt="{{ $product->name }}"
                        >
                    </td>

                    {{-- Product Name --}}
                    <td>{{ $product->name }}</td>

                    {{-- Description --}}
                    <td>
                        <span title="{{ $product->description }}">
                            {{ \Illuminate\Support\Str::limit($product->description, 50) }}
                        </span>
                    </td>

                    {{-- SKU --}}
                    <td>{{ $product->sku }}</td>

                    {{-- Price --}}
                    <td>{{ number_format($product->price, 2) }}</td>

                    {{-- Stock --}}
                    <td>
                        @if($product->stock <= 0)
                            <span class="badge bg-danger">Out of Stock</span>
                        @else
                            <span class="badge bg-success">{{ $product->stock }}</span>
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
                    <td class="d-flex gap-1">
                        <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">No out-of-stock products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        @if($products->hasPages())
        <div class="d-flex justify-content-center mt-3">
            {{ $products->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
