@extends('admin.layouts.app')

@section('title', 'Add Payment Gateway')

@section('content')
<div class="container mt-4">
    <h3>➕ Add Payment Gateway</h3>

    <form action="{{ route('admin.payment_gateways.store') }}" method="POST" class="mt-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Gateway Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Provider</label>
            <input type="text" name="provider" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="active" value="1" checked>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">💾 Save Gateway</button>
        <a href="{{ route('admin.payment_gateways.index') }}" class="btn btn-secondary">⬅ Back</a>
    </form>
</div>
@endsection
