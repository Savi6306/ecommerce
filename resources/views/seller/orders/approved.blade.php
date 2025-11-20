@extends('seller.layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">✅ Approved Orders</h2>
        <a href="{{ route('seller.orders.index') }}" class="btn btn-outline-primary">← Back to All Orders</a>
    </div>

    @if($orders->count() > 0)
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Buyer</th>
                        <th>Total Amount (₹)</th>
                        <th>Payment Status</th>
                        <th>Payment Method</th>
                        <th>Shipping Address</th>
                        <th>Tracking Number</th>
                        <th>Tax</th>
                        <th>Discount</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->buyer->name ?? 'N/A' }}</td>
                        <td>{{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            <span class="badge bg-success text-uppercase">{{ $order->payment_status }}</span>
                        </td>
                        <td>{{ $order->payment_method ?? '-' }}</td>
                        <td>{{ $order->shipping_address ?? '-' }}</td>
                        <td>{{ $order->tracking_number ?? '-' }}</td>
                        <td>{{ number_format($order->tax_amount, 2) }}</td>
                        <td>{{ number_format($order->discount_amount, 2) }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('seller.orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
        <p class="text-muted">No approved orders found.</p>
    @endif

</div>
@endsection
