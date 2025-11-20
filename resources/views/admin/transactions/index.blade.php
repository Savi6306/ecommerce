@extends('admin.layouts.app')

@section('title', 'Transactions')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>💰 All Transactions</h3>
       <a href="{{ route('admin.transactions.create') }}" class="btn btn-primary">➕ Add Transaction</a>
      </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Seller</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $t)
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->seller->name ?? 'N/A' }}</td>
                            <td>₹{{ number_format($t->amount, 2) }}</td>
                            <td>{{ ucfirst($t->payment_method) }}</td>
                            <td>
                                @if($t->status == 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @elseif($t->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @else
                                    <span class="badge bg-danger">Failed</span>
                                @endif
                            </td>
                            <td>{{ $t->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.transactions.edit', $t->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                                <form action="{{ route('admin.transactions.destroy', $t->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this transaction?')" class="btn btn-sm btn-danger">🗑️ Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No transactions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">{{ $transactions->links() }}</div>
        </div>
    </div>
</div>
@endsection
