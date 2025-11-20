@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>🟡 Pending Seller Approvals</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Store</th>
                <th>Email</th>
                <th>Verify</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sellers as $seller)
                <tr>
                    <td>{{ $seller->name }}</td>
                    <td>{{ $seller->store_name }}</td>
                    <td>{{ $seller->email }}</td>
                    <td>
                        <form action="{{ route('admin.sellers.verify', $seller->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-success btn-sm">✅ Approve</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No pending approvals</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
