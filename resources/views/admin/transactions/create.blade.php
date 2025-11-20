@extends('admin.layouts.app')

@section('title', 'Add Transaction')

@section('content')
<div class="container mt-4">
    <h3>➕ Add Transaction</h3>

    <form action="{{ route('admin.transactions.store') }}" method="POST" class="mt-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Seller</label>
            <select name="seller_id" class="form-select">
                <option value="">-- Select Seller --</option>
                @foreach($sellers as $seller)
                    <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Payment Method</label>
            <input type="text" name="payment_method" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="completed">Completed</option>
                <option value="pending">Pending</option>
                <option value="failed">Failed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 Save</button>
        <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">⬅ Back</a>
    </form>
</div>
@endsection
