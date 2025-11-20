@extends('admin.layouts.app')

@section('title', 'Shipping Partners')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">🚚 Shipping Partners</h3>

    <a href="{{ route('admin.shipping.partners.create') }}" class="btn btn-primary mb-3">
        ➕ Add Partner
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($partners as $partner)
                <tr>
                    <td>{{ $partner->id }}</td>
                    <td>{{ $partner->name }}</td>
                    <td>{{ $partner->contact_email ?? '-' }}</td>
                    <td>{{ $partner->contact_phone ?? '-' }}</td>
                    <td>{{ $partner->active ? '✅ Active' : '❌ Inactive' }}</td>
                    <td>
                        <form action="{{ route('admin.shipping.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Delete this partner?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted">No partners found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $partners->links() }}
</div>
@endsection
