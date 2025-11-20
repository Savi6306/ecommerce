@extends('admin.layouts.app')

@section('title', 'Edit Role')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">✏️ Edit Role</h3>

    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ $role->name }}" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Slug:</label>
            <input type="text" name="slug" value="{{ $role->slug }}" class="form-control" required>
            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
