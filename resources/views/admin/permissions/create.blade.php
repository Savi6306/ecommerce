@extends('admin.layouts.app')

@section('title', 'Create Permission')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">➕ Add New Permission</h3>

    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Slug:</label>
            <input type="text" name="slug" class="form-control" required>
            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
