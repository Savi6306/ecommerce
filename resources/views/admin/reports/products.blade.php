@extends('admin.layouts.app')
@section('title', 'Product Reports')

@section('content')
<div class="container mt-4">
    <h4>📦 Product Reports</h4>
    <hr>

    <div class="card mb-4">
        <div class="card-header fw-bold">🔥 Top 10 Selling Products</div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Product</th>
                        <th>Orders</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topProducts as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->orders_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header fw-bold">⚠️ Low Stock Products (Less than 10)</div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Product</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lowStock as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
