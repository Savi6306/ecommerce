@extends('admin.layouts.app')

@section('title', 'Add Brand')

@section('content')
<div class="container mt-4">
    <h3>➕ Add Brand</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">💾 Save Brand</button>
        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
