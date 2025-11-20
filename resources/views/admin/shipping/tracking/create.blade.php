@extends('admin.layouts.app')

@section('title', 'Add Delivery Tracking')

@section('content')
<div class="container mt-4">
    <h3>➕ Add Delivery Tracking</h3>

    <form action="{{ route('admin.shipping.tracking.store') }}" method="POST" class="card p-4 shadow-sm mt-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tracking Number</label>
            <input type="text" name="tracking_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Order Number</label>
            <input type="text" name="order_number" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Shipping Partner</label>
            <select name="shipping_partner_id" class="form-control">
                <option value="">-- Select Partner --</option>
                @foreach($partners as $partner)
                    <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" value="pending">
        </div>

        <button class="btn btn-success">Save Tracking</button>
        <a href="{{ route('admin.shipping.tracking.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
