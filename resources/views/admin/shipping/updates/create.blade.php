@extends('admin.layouts.app')

@section('title', 'Add Status Update')

@section('content')
<div class="container mt-4">
    <h3>➕ Add Status Update for Tracking #{{ $tracking->tracking_number }}</h3>

    <form action="{{ route('admin.shipping.updates.store', $tracking->id) }}" method="POST" class="card p-4 shadow-sm mt-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" placeholder="e.g. Out for delivery" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" placeholder="e.g. Delhi, India">
        </div>

        <div class="mb-3">
            <label class="form-label">Remarks</label>
            <textarea name="remarks" class="form-control" rows="3"></textarea>
        </div>

        <button class="btn btn-success">Save Update</button>
        <a href="{{ route('admin.shipping.tracking.show', $tracking->id) }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
