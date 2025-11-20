@extends('seller.layouts.app')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🚚 In Transit Orders</h2>
        <a href="{{ route('seller.orders.index') }}" class="btn btn-outline-primary">← Back to All Orders</a>
    </div>

    @if($orders->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Order Number</th>
                        <th>Total Amount</th>
                        <th>Payment Status</th>
                        <th>Shipping Address</th>
                        <th>Tracking Number</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->order_number }}</td>
                            <td>₹{{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                <span class="badge bg-{{ $order->payment_status == 'paid' ? 'success' : ($order->payment_status == 'failed' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </td>
                            <td>{{ $order->shipping_address ?? 'N/A' }}</td>
                            <td>{{ $order->tracking_number ?? '—' }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-5">
            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076504.png" width="120" class="mb-3">
            <h5 class="text-muted">No orders are currently in transit.</h5>
        </div>
    @endif

</div>
@endsection
