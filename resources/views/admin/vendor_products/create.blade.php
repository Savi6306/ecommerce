@extends('admin.layouts.app')

@section('content')
<h1>Add Vendor Product</h1>

<form action="{{ route('admin.vendor_products.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Vendor</label>
        <select name="vendor_id" class="form-control" required>
            <option value="">Select Vendor</option>
            @foreach ($vendors as $vendor)
                <option value="{{ $vendor->id }}">{{ $vendor->store_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>SKU</label>
        <input type="text" name="sku" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" step="0.01" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
