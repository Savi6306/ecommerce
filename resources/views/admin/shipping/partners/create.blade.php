@extends('admin.layouts.app')

@section('title', 'Add Shipping Partner')

@section('content')
<div class="container mt-4">
    <h3>➕ Add Shipping Partner</h3>

    <form action="{{ route('admin.shipping.partners.store') }}" method="POST" class="card p-4 shadow-sm mt-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Partner Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contact Email</label>
            <input type="email" name="contact_email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Contact Phone</label>
            <input type="text" name="contact_phone" class="form-control">
        </div>

        <button class="btn btn-success">Save Partner</button>
        <a href="{{ route('admin.shipping.partners.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
