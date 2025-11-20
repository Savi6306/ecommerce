@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>📊 Seller Analytics</h3>

    <div class="row text-center mb-4">
        @foreach($analytics as $key => $value)
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm p-3">
                    <h6>{{ ucwords(str_replace('_', ' ', $key)) }}</h6>
                    <h4 class="fw-bold text-primary">{{ $value }}</h4>
                </div>
            </div>
        @endforeach
    </div>

    <h5>Recent Sellers</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Store</th>
                <th>Email</th>
                <th>Verified</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recent as $seller)
                <tr>
                    <td>{{ $seller->name }}</td>
                    <td>{{ $seller->store_name }}</td>
                    <td>{{ $seller->email }}</td>
                    <td>{{ $seller->is_verified ? '✅' : '❌' }}</td>
                    <td>{{ $seller->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
