@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h2>Delivered Orders</h2>

    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Buyer</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->buyer->name ?? 'N/A' }}</td>
                    <td>₹{{ number_format($order->total, 2) }}</td>
                    <td><span class="badge bg-success">Delivered</span></td>
                    <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No delivered orders found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $orders->links() }}
</div>
@endsection
