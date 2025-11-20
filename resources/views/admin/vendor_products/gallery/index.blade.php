@extends('admin.layouts.app')

@section('title', 'Vendor Product Gallery')

@section('content')
<div class="container mt-4">
    <h2>Gallery for: {{ $product->name ?? 'Product' }}</h2>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Upload new image --}}
    <form 
        action="{{ route('admin.vendor_products.gallery.store', $product->id) }}" 
        method="POST" 
        enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <hr>

    {{-- Gallery list --}}
    <div class="row mt-4">
        @forelse($images as $img)
            <div class="col-md-3 mb-4 text-center">
                <div class="card">
                    <img src="{{ asset('storage/' . $img->image_path) }}" class="card-img-top" alt="Image">
                    <div class="card-body">
                        @if($img->is_featured)
                            <span class="badge bg-success">Featured</span>
                        @endif

                        {{-- Delete --}}
                        <form action="{{ route('admin.vendor_products.gallery.destroy', $img->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm mt-2" onclick="return confirm('Delete this image?')">Delete</button>
                        </form>

                        {{-- Set Featured --}}
                        <form action="{{ route('admin.vendor_products.gallery.featured', $img->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-warning btn-sm mt-2">Set Featured</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>No images uploaded yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
