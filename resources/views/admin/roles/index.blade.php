@extends('admin.layouts.app')

@section('title', 'Roles')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">🔒 Roles Management</h3>

    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary mb-3">➕ Add New Role</a>

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
            @forelse($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->slug }}</td>
                    <td>
                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this role?')" class="btn btn-sm btn-danger">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No roles found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
