@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>➕ Add New Product</h3>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">⬅️ Back to Products</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Product Name *</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">SKU *</label>
                <input type="text" name="sku" class="form-control" required value="{{ old('sku') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Brand</label>
                <select name="brand_id" class="form-select">
                    <option value="">-- Select Brand --</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Price (₹)</label>
                <input type="number" step="0.01" name="price" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Discount Price (₹)</label>
                <input type="number" step="0.01" name="discount_price" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="0">
            </div>

            <div class="col-md-12">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label"> Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Product Type</label>
                <select name="type" class="form-select">
                    <option value="inhouse">In-House</option>
                    <option value="seller">Seller</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-check-label me-2">Featured</label>
                <input type="checkbox" name="is_featured" value="1">
            </div>

            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-success">💾 Save Product</button>
        </div>
    </form>
</div>
@endsection
