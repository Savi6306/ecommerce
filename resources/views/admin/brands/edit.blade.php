@extends('admin.layouts.app')

@section('title', 'Edit Brand')

@section('content')
<div class="container mt-4">
    <h3>✏️ Edit Brand - {{ $brand->name }}</h3>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-3">
            <label class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $brand->name) }}">
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $brand->description) }}</textarea>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="active" {{ old('status', $brand->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $brand->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label class="form-label">Image (optional)</label>
            <input type="file" name="image" class="form-control">
            @if($brand->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$brand->image) }}" width="100" class="rounded">
                </div>
            @endif
        </div>

        {{-- Buttons --}}
        <div class="mt-4 d-flex">
            <button type="submit" class="btn btn-success me-2">💾 Update Brand</button>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
