@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Promotion Management</h2>
        <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary">+ Add Promotion</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Discount</th>
                <th>Coupon Code</th>
                <th>Start</th>
                <th>End</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($promotions as $promo)
                <tr>
                    <td>{{ $promo->id }}</td>
                    <td>{{ $promo->title }}</td>
                    <td>{{ ucfirst($promo->type) }}</td>
                    <td>{{ $promo->discount ? $promo->discount . '%' : '-' }}</td>
                    <td>{{ $promo->coupon_code ?? '-' }}</td>
                    <td>{{ $promo->start_date }}</td>
                    <td>{{ $promo->end_date }}</td>
                    <td>
                        <span class="badge bg-{{ $promo->status ? 'success' : 'secondary' }}">
                            {{ $promo->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.promotions.edit', $promo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.promotions.destroy', $promo->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure to delete this promotion?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">No promotions found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $promotions->links() }}
</div>
@endsection
