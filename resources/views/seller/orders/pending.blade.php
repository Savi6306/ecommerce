@extends('seller.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🕓 Pending Orders</h2>
        <a href="{{ route('seller.orders.index') }}" class="btn btn-outline-primary">← Back to All Orders</a>
    </div>

    @if($orders->count() > 0)
        <div class="row g-3">
            @foreach($orders as $order)
                <div class="col-md-4 col-lg-3">
                    <div class="card shadow-sm h-100 border-0 rounded-3 hover-shadow" style="transition: transform 0.2s;">
                        <div class="card-body d-flex flex-column justify-content-between">

                            <div>
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="card-title mb-0">Order #{{ $order->order_number }}</h6>
                                    <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
                                </div>
                                <p class="mb-1"><strong>Total:</strong> ₹{{ number_format($order->total_amount, 2) }}</p>
                                <p class="mb-1"><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                            </div>

                            <div class="mt-3 d-flex flex-column gap-2">
                                <a href="{{ route('seller.orders.show', $order->id) }}" class="btn btn-sm btn-primary w-100">View</a>

                                <form action="{{ route('seller.orders.updateStatus', $order->id) }}" method="POST" class="d-flex gap-1 w-100">
                                    @csrf
                                    <input type="hidden" name="status" value="accepted">
                                    <button class="btn btn-sm btn-success flex-fill">Accept</button>
                                </form>

                                <form action="{{ route('seller.orders.updateStatus', $order->id) }}" method="POST" class="d-flex gap-1 w-100">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button class="btn btn-sm btn-danger flex-fill">Reject</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">No pending orders found.</div>
    @endif
</div>

<style>
.hover-shadow:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.12);
}
</style>
@endsection
