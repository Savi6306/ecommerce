@extends('admin.layouts.app')

@section('title', 'Delivery Tracking')

@section('content')
<div class="container mt-4">
    <h3>📦 Delivery Tracking</h3>

    <a href="{{ route('admin.shipping.tracking.create') }}" class="btn btn-primary mb-3">
        ➕ Add Tracking
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tracking #</th>
                <th>Order #</th>
                <th>Partner</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($trackings as $tracking)
                <tr>
                    <td>{{ $tracking->id }}</td>
                    <td>{{ $tracking->tracking_number }}</td>
                    <td>{{ $tracking->order_number ?? '-' }}</td>
                    <td>{{ $tracking->partner->name ?? 'N/A' }}</td>
                    <td>{{ ucfirst($tracking->status) }}</td>
                    <td>{{ $tracking->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.shipping.tracking.show', $tracking->id) }}" class="btn btn-info btn-sm">👁️ View</a>
                        <form action="{{ route('admin.shipping.tracking.destroy', $tracking->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete tracking?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center text-muted">No tracking records found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $trackings->links() }}
</div>
@endsection
