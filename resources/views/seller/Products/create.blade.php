@extends('seller.layouts.app')

@section('content')
<div class="container py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Add New Product</h4>
        <a href="{{ route('seller.products.index') }}" class="btn btn-secondary">← Back to Products</a>
    </div>

    <div class="card">
        <div class="card-body">

            {{-- Display Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">

                    {{-- Product Name --}}
                    <div class="col-md-6">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    {{-- SKU --}}
                    <div class="col-md-6">
                        <label class="form-label">SKU</label>
                        <input type="text" name="sku" class="form-control" value="{{ old('sku') }}" required>
                    </div>

                    {{-- Price --}}
                    <div class="col-md-6">
                        <label class="form-label">Price (₹)</label>
                        <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price') }}" required>
                    </div>

                    {{-- Stock --}}
                    <div class="col-md-6">
                        <label class="form-label">Stock Quantity</label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    {{-- Featured --}}
                    <div class="col-md-6">
                        <label class="form-label">Featured</label>
                        <select name="is_featured" class="form-select">
                            <option value="0" {{ old('is_featured')=='0' ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('is_featured')=='1' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                    {{-- Description --}}
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                    </div>

                    {{-- Product Image --}}
                    <div class="col-12">
                        <label class="form-label">Product Image</label>
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Accepted formats: jpg, png. Max size: 2MB.</small>
                    </div>

                    {{-- Submit Button --}}
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-success">Save Product</button>
                    </div>

                </div>
            </form>

        </div>
    </div>

</div>
@endsection
