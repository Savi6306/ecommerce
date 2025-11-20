@extends('admin.layouts.app')

@section('title', 'Edit Transaction')

@section('content')
<div class="container mt-4">
    <h3>✏️ Edit Transaction</h3>

    <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Seller</label>
            <select name="seller_id" class="form-select">
                <option value="">-- Select Seller --</option>
                @foreach($sellers as $seller)
                    <option value="{{ $seller->id }}" {{ $transaction->seller_id == $seller->id ? 'selected' : '' }}>
                        {{ $seller->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" value="{{ $transaction->amount }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Payment Method</label>
            <input type="text" name="payment_method" value="{{ $transaction->payment_method }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="completed" {{ $transaction->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="failed" {{ $transaction->status == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 Update</button>
        <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">⬅ Back</a>
    </form>
</div>
@endsection
