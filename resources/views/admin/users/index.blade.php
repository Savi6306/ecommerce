@extends('admin.layouts.app')

@section('title', 'Manage Users')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>👥 Users Management</h3>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">➕ Add User</a>
    </div>

    {{-- Filter by Role --}}
    <form method="GET" class="mb-3">
        <div class="row g-2">
            <div class="col-md-4">
                <select name="role" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Filter by Role --</option>
                    @foreach($roles as $r)
                        <option value="{{ $r->slug }}" {{ $roleSlug == $r->slug ? 'selected' : '' }}>
                            {{ ucfirst($r->name) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- User Table --}}
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->gender ?? '-') }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge bg-secondary">{{ ucfirst($role->name) }}</span>
                                @endforeach
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure to delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">🗑️ Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

           @if(method_exists($users, 'links'))
    <div class="mt-3">
        {{ $users->links() }}
    </div>
@endif

        </div>
    </div>
</div>
@endsection
