@extends('seller.layouts.app')

@section('content')
<div class="container py-4">

    {{-- ✅ Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📦 All Orders</h2>
    </div>

    {{-- ✅ Summary Cards --}}
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card p-3 shadow-sm border-0">
                <h6 class="text-muted">Total Orders Today</h6>
                <h3 class="fw-bold">{{ $totalOrdersToday ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card p-3 shadow-sm border-0">
                <h6 class="text-muted">Pending Orders Today</h6>
                <h3 class="fw-bold text-warning">{{ $pendingOrdersToday ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card p-3 shadow-sm border-0">
                <h6 class="text-muted">In Transit Today</h6>
                <h3 class="fw-bold text-info">{{ $inTransitOrdersToday ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card p-3 shadow-sm border-0">
                <h6 class="text-muted">Approved Orders Today</h6>
                <h3 class="fw-bold text-success">{{ $approvedOrdersToday ?? 0 }}</h3>
            </div>
        </div>
    </div>

    {{-- ✅ Orders Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Order Number</th>
                            <th>Buyer</th>
                            <th>Total (₹)</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration + ($orders->currentPage()-1) * $orders->perPage() }}</td>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->buyer->name ?? 'N/A' }}</td>
                                <td>₹{{ number_format($order->total_amount, 2) }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $order->status == 'pending' ? 'bg-warning text-dark' : 
                                           ($order->status == 'approved' ? 'bg-success' : 
                                           ($order->status == 'in_transit' ? 'bg-info text-dark' : 
                                           ($order->status == 'delivered' ? 'bg-primary' : 'bg-secondary'))) }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td>{{ ucfirst($order->payment_status) }}</td>
                                <td>
                                    <a href="{{ route('seller.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ✅ Pagination --}}
            <div class="d-flex justify-content-center p-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
