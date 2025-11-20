@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">✏️ Edit In-House Product</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following errors:<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.inhouse_products.update', $inhouse_product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $inhouse_product->name) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>SKU</label>
                <input type="text" name="sku" class="form-control" value="{{ old('sku', $inhouse_product->sku) }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" value="{{ old('price', $inhouse_product->price) }}" required>
            </div>
  {{-- ✅ Added Quantity Field --}}
            <div class="col-md-4 mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" min="0"
                       value="{{ old('quantity', $inhouse_product->quantity ?? 0) }}" required>
            </div>
            <div class="col-md-12 mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $inhouse_product->description) }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label>Change Image (optional)</label>
                <input type="file" name="image" class="form-control" id="imageInput" accept="image/*">

                @if($inhouse_product->image)
                    <div class="mt-3">
                        <p>Current Image:</p>
                        <img src="{{ asset($inhouse_product->image) }}" alt="Current Image" style="max-width: 150px;">
                    </div>
                @endif

                <img id="previewImage" src="#" alt="Preview" class="mt-3" style="max-width: 150px; display: none;">
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Product</button>
        <a href="{{ route('admin.inhouse_products.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>

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
