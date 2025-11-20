@extends('admin.layouts.app')

@section('title', 'Payment Gateways')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>💳 Payment Gateways</h3>
        <a href="{{ route('admin.payment_gateways.create') }}" class="btn btn-primary">➕ Add Gateway</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Provider</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($gateways as $gateway)
                <tr>
                    <td>{{ $gateway->id }}</td>
                    <td>{{ $gateway->name }}</td>
                    <td>{{ $gateway->provider }}</td>
                    <td>
                        @if($gateway->active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{ $gateway->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.payment_gateways.edit', $gateway->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                        <form action="{{ route('admin.payment_gateways.destroy', $gateway->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this gateway?')" class="btn btn-sm btn-danger">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No payment gateways found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $gateways->links() }}
    </div>
</div>
@endsection
