@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">📦 In-House Products</h1>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.inhouse_products.create') }}" class="btn btn-primary mb-3">➕ Add Product</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if($product->image)
                                {{-- ✅ Use asset() with correct storage path --}}
                                <img src="{{ asset($product->image) }}" width="60" class="rounded shadow-sm">
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>₹{{ number_format($product->price, 2) }}</td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>{{ $product->created_at->format('Y-m-d') }}</td>
                        <td>{{ $product->updated_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.inhouse_products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.inhouse_products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="9" class="text-center text-muted">No products found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>
</div>
@endsection
