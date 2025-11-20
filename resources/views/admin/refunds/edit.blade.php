@extends('admin.layouts.app')

@section('title', 'Edit Refund')

@section('content')
<div class="container mt-4">
    <h3>✏️ Edit Refund</h3>

    <form action="{{ route('admin.refunds.update', $refund->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Transaction</label>
            <select name="transaction_id" class="form-select" required>
                @foreach($transactions as $t)
                    <option value="{{ $t->id }}" {{ $refund->transaction_id == $t->id ? 'selected' : '' }}>
                        #{{ $t->id }} (₹{{ $t->amount }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Refund Amount</label>
            <input type="number" name="amount" value="{{ $refund->amount }}" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Reason</label>
            <textarea name="reason" class="form-control" rows="3">{{ $refund->reason }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="pending" {{ $refund->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $refund->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $refund->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 Update</button>
        <a href="{{ route('admin.refunds.index') }}" class="btn btn-secondary">⬅ Back</a>
    </form>
</div>
@endsection
