@extends('admin.layouts.app')

@section('title', 'Stock History')

@section('content')
<div class="container mt-4">
    <h3>📜 Stock History</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th><th>Quantity</th><th>Type</th><th>Reason</th><th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($history as $h)
                <tr>
                    <td>{{ $h->product->name }}</td>
                    <td>{{ $h->quantity }}</td>
                    <td>{{ ucfirst($h->type) }}</td>
                    <td>{{ $h->reason ?? '-' }}</td>
                    <td>{{ $h->created_at->format('d M Y, h:i A') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $history->links() }}
</div>
@endsection
