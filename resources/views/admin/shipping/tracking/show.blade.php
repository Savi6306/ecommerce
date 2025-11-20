@extends('admin.layouts.app')

@section('title', 'Tracking Details')

@section('content')
<div class="container mt-4">
    <h3>📦 Tracking Details</h3>

    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h5>Tracking #: {{ $tracking->tracking_number }}</h5>
            <p>Order: {{ $tracking->order_number ?? '-' }}</p>
            <p>Partner: {{ $tracking->partner->name ?? 'N/A' }}</p>
            <p>Status: <strong>{{ ucfirst($tracking->status) }}</strong></p>
        </div>
    </div>

    <a href="{{ route('admin.shipping.updates.create', $tracking->id) }}" class="btn btn-primary mb-3">
        ➕ Add Status Update
    </a>

    <h5>📜 Status Updates</h5>
    <ul class="list-group">
        @forelse($tracking->updates as $update)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>
                    {{ ucfirst($update->status) }} — {{ $update->location ?? 'Unknown Location' }}
                </span>
                <small class="text-muted">{{ $update->updated_at->format('d M Y, h:i A') }}</small>
            </li>
        @empty
            <li class="list-group-item text-center text-muted">No updates yet.</li>
        @endforelse
    </ul>
</div>
@endsection
