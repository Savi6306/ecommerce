@extends('layout.app')

@section('content')
<div class="container my-5">
    <h3 class="text-center mb-4 text-primary fw-bold">My Orders</h3>

    @if($orders->isEmpty())
        <div class="alert alert-info text-center">
            You haven’t placed any orders yet.
        </div>
    @else
        <div class="card shadow-sm p-4">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Order ID</th>
                        <th>Products</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Payment Method</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
@foreach($orders as $order)
<tr>
    <td>#{{ $order->id }}</td>
    <td>
        @if($order->orderItems->isNotEmpty())
            @foreach($order->orderItems as $item)
                <span class="d-block">
                    {{ $item->product->name ?? 'Product Deleted' }} (x{{ $item->quantity }})
                </span>
            @endforeach
        @else
            <span class="text-muted">No products</span>
        @endif
    </td>
    <td>₹{{ number_format($order->final_total, 2) }}</td>
    <td>
        <span class="badge bg-{{ $order->status == 'Pending' ? 'warning' : ($order->status == 'Processing' ? 'info' : 'success') }}">
            {{ ucfirst($order->status) }}
        </span>
    </td>
    <td>{{ $order->payment_method ?? 'Pending' }}</td>
    <td>{{ $order->created_at->format('d M Y') }}</td>
    <td>
        <a href="{{ route('track.order', $order->id) }}" class="btn btn-sm" style="background-color:#009688; color:white;">
            Track Order
        </a>
    </td>
</tr>
@endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>


<style>
.table-hover tbody tr:hover {
    background-color: #f1f5f9;
    transition: 0.3s;
}
.card {
    border-radius: 15px;
}
</style>
@endsection
