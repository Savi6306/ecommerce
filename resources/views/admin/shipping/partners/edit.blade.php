@extends('admin.layouts.app')

@section('title', 'Edit Shipping Partner')

@section('content')
<div class="container mt-4">
    <h3>✏️ Edit Shipping Partner</h3>

    <form action="{{ route('admin.shipping.partners.update', $partner->id) }}" method="POST" class="card p-4 shadow-sm mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Partner Name</label>
            <input type="text" name="name" value="{{ old('name', $partner->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contact Email</label>
            <input type="email" name="contact_email" value="{{ old('contact_email', $partner->contact_email) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Contact Phone</label>
            <input type="text" name="contact_phone" value="{{ old('contact_phone', $partner->contact_phone) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Active</label>
            <select name="active" class="form-control">
                <option value="1" {{ $partner->active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$partner->active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button class="btn btn-success">Update Partner</button>
        <a href="{{ route('admin.shipping.partners.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
