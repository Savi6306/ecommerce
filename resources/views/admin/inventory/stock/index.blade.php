@extends('admin.layouts.app')

@section('title', 'Warehouse Stock')

@section('content')
<div class="container mt-4">
    <h3>📦 Warehouse Stock</h3>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Warehouse</th><th>Product</th><th>Quantity</th><th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $s)
                <tr>
                    <td>{{ $s->warehouse->name }}</td>
                    <td>{{ $s->product->name }}</td>
                    <td>{{ $s->quantity }}</td>
                    <td>{{ $s->updated_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $stocks->links() }}
</div>
@endsection
