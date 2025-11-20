@extends('admin.layouts.app')

@section('title', 'Edit Payment Gateway')

@section('content')
<div class="container mt-4">
    <h3>✏️ Edit Payment Gateway</h3>

    <form action="{{ route('admin.payment_gateways.update', $paymentGateway->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Gateway Name</label>
            <input type="text" name="name" value="{{ $paymentGateway->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Provider</label>
            <input type="text" name="provider" value="{{ $paymentGateway->provider }}" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="active" value="1" {{ $paymentGateway->active ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">💾 Update</button>
        <a href="{{ route('admin.payment_gateways.index') }}" class="btn btn-secondary">⬅ Back</a>
    </form>
</div>
@endsection
