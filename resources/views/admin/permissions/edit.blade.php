@extends('admin.layouts.app')

@section('title', 'Edit Permission')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">✏️ Edit Permission</h3>

    <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ $permission->name }}" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Slug:</label>
            <input type="text" name="slug" value="{{ $permission->slug }}" class="form-control" required>
            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
