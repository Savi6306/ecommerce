@extends('seller.layouts.app')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Order Details - #{{ $order->order_number }}</h2>
        <a href="{{ route('seller.orders.index') }}" class="btn btn-secondary">← Back to Orders</a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Buyer Information --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Buyer Information</h5>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $order->buyer->name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $order->buyer->email ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $order->buyer->phone ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $order->buyer->address ?? '-' }}</p>
        </div>
    </div>

    {{-- Order Items --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Products in Order</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price (₹)</th>
                            <th>Total (₹)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order->items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product->name ?? 'Deleted Product' }}</td>
                                <td>
                                    <img src="{{ $item->product->image ? asset('storage/products/'.$item->product->image) : asset('images/default-product.png') }}" 
                                         width="50" class="rounded">
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>₹{{ number_format($item->price, 2) }}</td>
                                <td>₹{{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No items in this order.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" class="text-end">Total Amount:</th>
                            <th>₹{{ number_format($order->total_amount, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    {{-- Order Status --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Order Status</h5>
        </div>
        <div class="card-body d-flex align-items-center justify-content-between">
            <div>
                <span class="badge 
                    {{ $order->status == 'pending' ? 'bg-warning text-dark' : 
                       ($order->status == 'approved' ? 'bg-success' : 
                       ($order->status == 'in_transit' ? 'bg-info text-dark' : 
                       ($order->status == 'delivered' ? 'bg-primary' : 'bg-secondary'))) }}">
                    {{ ucfirst($order->status) }}
                </span>
                <span class="ms-3">Payment: {{ ucfirst($order->payment_status) }}</span>
            </div>
            <div>
                {{-- Optional: Buttons to update status --}}
                @if($order->status != 'delivered')
                    <a href="{{ route('seller.orders.updateStatus', [$order->id, 'in_transit']) }}" 
                       class="btn btn-info btn-sm">Mark In Transit</a>
                    <a href="{{ route('seller.orders.updateStatus', [$order->id, 'delivered']) }}" 
                       class="btn btn-success btn-sm">Mark Delivered</a>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
