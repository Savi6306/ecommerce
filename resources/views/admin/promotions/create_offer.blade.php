@extends('admin.layouts.app')

@section('title','Add New Offer')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Add New Offer</h4>
        <a href="{{ route('admin.promotions.offers') }}" class="btn btn-secondary">Back to Offers</a>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Create Offer Form --}}
    <form action="{{ route('admin.promotions.offers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Offer Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="discount" class="form-label">Discount (%)</label>
            <input type="number" name="discount" class="form-control" min="0" max="100">
        </div>

        <div class="mb-3">
            <label for="coupon_code" class="form-label">Coupon Code</label>
            <input type="text" name="coupon_code" class="form-control">
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="status" value="1" class="form-check-input" id="status" checked>
            <label class="form-check-label" for="status">Active</label>
        </div>

        <button type="submit" class="btn btn-success">Save Offer</button>
    </form>

</div>
@endsection
