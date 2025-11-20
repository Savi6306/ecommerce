@extends('admin.layouts.app')

@section('title', 'Edit Status Update')

@section('content')
<div class="container mt-4">
    <h3>✏️ Edit Status Update for Tracking #{{ $update->tracking->tracking_number }}</h3>

    <form action="{{ route('admin.shipping.updates.update', $update->id) }}" method="POST" class="card p-4 shadow-sm mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" value="{{ old('status', $update->status) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" value="{{ old('location', $update->location) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Remarks</label>
            <textarea name="remarks" class="form-control" rows="3">{{ old('remarks', $update->remarks) }}</textarea>
        </div>

        <button class="btn btn-success">Update Status</button>
        <a href="{{ route('admin.shipping.tracking.show', $update->delivery_tracking_id) }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
