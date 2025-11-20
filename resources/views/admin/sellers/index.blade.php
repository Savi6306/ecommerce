@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>🏬 All Sellers</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Profile</th>
                <th>Name</th>
                <th>Store</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Verified</th>
                <th>WhatsApp</th>
                <th>Joined</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sellers as $seller)
                <tr>
                    <td>{{ $seller->id }}</td>
                    <td>
                       
<img src="{{ asset('storage/'.$seller->profile_photo) }}"
     alt="Profile Photo"
     width="120"
     height="120"
     class="rounded-circle object-fit-cover">
                    </td>
                    <td>{{ $seller->name }}</td>
                    <td>{{ $seller->store_name }}</td>
                    <td>{{ $seller->email }}</td>
                    <td>{{ $seller->phone }}</td>
                    <td>
                        @if($seller->is_verified)
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-warning">No</span>
                        @endif
                    </td>
                    <td>{{ $seller->whatsapp_updates ? '✅' : '❌' }}</td>
                    <td>{{ $seller->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $sellers->links() }}
</div>
@endsection
