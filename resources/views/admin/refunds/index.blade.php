@extends('admin.layouts.app')

@section('title', 'Refund Tracking')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>↩️ Refund Tracking</h3>
        <a href="{{ route('admin.refunds.create') }}" class="btn btn-primary">➕ New Refund</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Transaction ID</th>
                <th>Amount</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Requested On</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($refunds as $refund)
                <tr>
                    <td>{{ $refund->id }}</td>
                    <td>#{{ $refund->transaction_id }}</td>
                    <td>₹{{ $refund->amount }}</td>
                    <td>{{ $refund->reason ?? '-' }}</td>
                    <td>
                        @if($refund->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($refund->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                    <td>{{ $refund->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.refunds.edit', $refund->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                        <form action="{{ route('admin.refunds.destroy', $refund->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this refund?')" class="btn btn-sm btn-danger">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No refunds found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $refunds->links() }}
    </div>
</div>
@endsection
