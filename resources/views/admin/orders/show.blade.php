@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h2>Order #{{ $order->id }} Details</h2>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Order Info</div>
        <div class="card-body">
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Total:</strong> ₹{{ number_format($order->total, 2) }}</p>
            <p><strong>Placed on:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-info text-white">Buyer Info</div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $order->buyer->name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $order->buyer->email ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $order->buyer->phone ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">Items</div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name ?? 'Deleted Product' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>₹{{ number_format($item->price, 2) }}</td>
                            <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Update Status Form --}}
    <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label fw-bold">Change Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="">-- Select Status --</option>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                <option value="refund" {{ $order->status == 'refund' ? 'selected' : '' }}>Refund</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Status</button>
    </form>

    <div class="mt-4">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-primary">← Back to Orders</a>
    </div>
</div>
@endsection
