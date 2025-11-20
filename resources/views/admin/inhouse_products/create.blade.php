@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">➕ Add In-House Product</h2>

    {{-- ✅ Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- ✅ Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following errors:
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.inhouse_products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>SKU <span class="text-danger">*</span></label>
                <input type="text" name="sku" class="form-control" value="{{ old('sku') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Price <span class="text-danger">*</span></label>
                <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Quantity <span class="text-danger">*</span></label>
                <input type="number" name="quantity" class="form-control" value="{{ old('quantity', 0) }}" required min="0">
            </div>

            <div class="col-md-12 mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" id="imageInput" accept="image/*">
                <img id="previewImage" src="#" alt="Preview" class="mt-3 rounded shadow-sm"
                     style="max-width: 150px; display: none;">
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">💾 Save Product</button>
            <a href="{{ route('admin.inhouse_products.index') }}" class="btn btn-secondary">↩️ Cancel</a>
        </div>
    </form>
</div>

{{-- ✅ Live Image Preview --}}
<script>
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const reader = new FileReader();
        reader.onload = function(event) {
            const img = document.getElementById('previewImage');
            img.src = event.target.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
@endsection
