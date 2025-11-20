@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h2>Edit Promotion</h2>

    <form action="{{ route('admin.promotions.update', $promotion->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Title</label>
                <input type="text" name="title" value="{{ $promotion->title }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Type</label>
                <select name="type" class="form-select" required>
                    <option value="discount" {{ $promotion->type == 'discount' ? 'selected' : '' }}>Discount</option>
                    <option value="coupon" {{ $promotion->type == 'coupon' ? 'selected' : '' }}>Coupon</option>
                    <option value="banner" {{ $promotion->type == 'banner' ? 'selected' : '' }}>Banner</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Discount (%)</label>
                <input type="number" name="discount" value="{{ $promotion->discount }}" class="form-control" step="0.01">
            </div>
            <div class="col-md-6 mb-3">
                <label>Coupon Code</label>
                <input type="text" name="coupon_code" value="{{ $promotion->coupon_code }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label>Start Date</label>
                <input type="date" name="start_date" value="{{ $promotion->start_date }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>End Date</label>
                <input type="date" name="end_date" value="{{ $promotion->end_date }}" class="form-control" required>
            </div>
            <div class="col-md-12 mb-3">
                <label>Banner Image</label><br>
                @if($promotion->banner)
                    <img src="{{ asset('storage/'.$promotion->banner) }}" width="150" class="mb-2">
                @endif
                <input type="file" name="banner" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Update Promotion</button>
        <a href="{{ route('admin.promotions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
