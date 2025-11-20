@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>💰 Seller Commission Setup</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Seller</th>
                <th>Store</th>
                <th>Verified</th>
                <th>Commission (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sellers as $seller)
                <tr>
                    <td>{{ $seller->name }}</td>
                    <td>{{ $seller->store_name }}</td>
                    <td>{{ $seller->is_verified ? '✅' : '❌' }}</td>
                    <td><input type="number" class="form-control" placeholder="10"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
