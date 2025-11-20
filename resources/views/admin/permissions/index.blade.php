@extends('admin.layouts.app')

@section('title', 'Permissions')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">🔑 Permissions Management</h3>

    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary mb-3">➕ Add New Permission</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->slug }}</td>
                    <td>
                        <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                        <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this permission?')" class="btn btn-sm btn-danger">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No permissions found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
