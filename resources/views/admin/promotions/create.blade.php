@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h2>Add New Promotion</h2>

    <form action="{{ route('admin.promotions.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Type</label>
                <select name="type" class="form-select" required>
                    <option value="discount">Discount</option>
                    <option value="coupon">Coupon</option>
                    <option value="banner">Banner</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Discount (%)</label>
                <input type="number" name="discount" class="form-control" step="0.01">
            </div>
            <div class="col-md-6 mb-3">
                <label>Coupon Code</label>
                <input type="text" name="coupon_code" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label>Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>End Date</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <div class="col-md-12 mb-3">
                <label>Banner Image</label>
                <input type="file" name="banner" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Save Promotion</button>
        <a href="{{ route('admin.promotions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
