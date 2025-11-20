@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Gallery for {{ $product->name }}</h2>

    <form action="{{ route('admin.product.gallery.store', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple required>
        <button type="submit" class="btn btn-primary">Upload Images</button>
    </form>

    <hr>

    <div class="row mt-4">
        @foreach($product->gallery as $img)
            <div class="col-md-3 text-center">
                <img src="{{ asset('storage/' . $img->image) }}" class="img-fluid rounded mb-2">
                <form action="{{ route('admin.product.gallery.destroy', $img->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
                @if(!$img->is_featured)
                    <form action="{{ route('admin.product.gallery.featured', $img->id) }}" method="POST" class="mt-1">
                        @csrf
                        <button class="btn btn-success btn-sm">Set Featured</button>
                    </form>
                @else
                    <span class="badge bg-success mt-1">Featured</span>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
