@extends('admin.layouts.app')

@section('title', 'Add Refund')

@section('content')
<div class="container mt-4">
    <h3>➕ Create Refund</h3>

    <form action="{{ route('admin.refunds.store') }}" method="POST" class="mt-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Transaction</label>
            <select name="transaction_id" class="form-select" required>
                <option value="">-- Select Transaction --</option>
                @foreach($transactions as $t)
                    <option value="{{ $t->id }}">#{{ $t->id }} (₹{{ $t->amount }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Refund Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Reason</label>
            <textarea name="reason" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">💾 Save Refund</button>
        <a href="{{ route('admin.refunds.index') }}" class="btn btn-secondary">⬅ Back</a>
    </form>
</div>
@endsection
