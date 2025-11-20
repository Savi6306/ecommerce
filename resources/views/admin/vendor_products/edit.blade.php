@extends('admin.layouts.app')

@section('content')
<h1>Edit Vendor Product</h1>

<form action="{{ route('admin.vendor_products.update', $vendor_product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Vendor</label>
        <select name="vendor_id" class="form-control" required>
            @foreach ($vendors as $vendor)
                <option value="{{ $vendor->id }}" {{ $vendor_product->vendor_id == $vendor->id ? 'selected' : '' }}>
                    {{ $vendor->store_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $vendor_product->name }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>SKU</label>
        <input type="text" name="sku" value="{{ $vendor_product->sku }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" step="0.01" value="{{ $vendor_product->price }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $vendor_product->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
