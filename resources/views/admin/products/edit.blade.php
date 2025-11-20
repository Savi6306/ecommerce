@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>✏️ Edit Product - {{ $product->name }}</h3>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">⬅️ Back</a>
    </div>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="row g-3">
            {{-- Product Name --}}
            <div class="col-md-6">
                <label class="form-label">Product Name *</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
            </div>

            {{-- SKU (readonly) --}}
            <div class="col-md-6">
                <label class="form-label">SKU *</label>
                <input type="text" name="sku" value="{{ $product->sku }}" class="form-control" readonly>
            </div>

            {{-- Category --}}
            <div class="col-md-6">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Brand --}}
            <div class="col-md-6">
                <label class="form-label">Brand</label>
                <select name="brand_id" class="form-select">
                    <option value="">-- Select Brand --</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Price --}}
            <div class="col-md-4">
                <label class="form-label">Price (₹)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
            </div>

            {{-- Discount Price --}}
            <div class="col-md-4">
                <label class="form-label">Discount Price (₹)</label>
                <input type="number" step="0.01" name="discount_price" value="{{ old('discount_price', $product->discount_price) }}" class="form-control">
            </div>

            {{-- Stock --}}
            <div class="col-md-4">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control">
            </div>

            {{-- Description --}}
            <div class="col-md-12">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
            </div>

            {{-- Image Upload --}}
            <div class="col-md-6">
                <label class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control">
                @if($product->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             width="120" height="120" class="rounded border" 
                             alt="Product Image">
                    </div>
                @endif
            </div>

            {{-- Product Type --}}
            <div class="col-md-6">
                <label class="form-label">Product Type</label>
                <select name="type" class="form-select">
                    <option value="inhouse" {{ $product->type == 'inhouse' ? 'selected' : '' }}>In-House</option>
                    <option value="seller" {{ $product->type == 'seller' ? 'selected' : '' }}>Seller</option>
                </select>
            </div>

            {{-- Featured --}}
            <div class="col-md-3 d-flex align-items-center">
                <input type="checkbox" name="is_featured" value="1" id="featuredCheck" {{ $product->is_featured ? 'checked' : '' }}>
                <label for="featuredCheck" class="form-check-label ms-2">Featured</label>
            </div>

            {{-- Status --}}
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        {{-- Submit --}}
        <div class="mt-4">
            <button type="submit" class="btn btn-success">💾 Update Product</button>
        </div>
    </form>
</div>
@endsection
