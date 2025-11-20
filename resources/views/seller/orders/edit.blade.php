@extends('seller.layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Order #{{ $order->order_number }}</h2>

    <form action="{{ route('seller.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Buyer --}}
        <div class="mb-3">
            <label for="buyer_id">Select Buyer</label>
            <select name="buyer_id" class="form-control">
                @foreach($buyers as $buyer)
                    <option value="{{ $buyer->id }}" {{ $order->buyer_id == $buyer->id ? 'selected' : '' }}>
                        {{ $buyer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Products --}}
        <h5>Products</h5>
        <div id="productsWrapper">
            @foreach($products as $product)
            @php
                $orderedItem = $order->items->firstWhere('product_id', $product->id);
            @endphp
            <div class="mb-2 d-flex align-items-center">
                <input type="checkbox" name="products[{{ $product->id }}][id]" value="{{ $product->id }}" {{ $orderedItem ? 'checked' : '' }}>
                <label class="ms-2">{{ $product->name }} - ₹{{ $product->price }}</label>
                <input type="number" name="products[{{ $product->id }}][quantity]" class="form-control ms-2" style="width:80px;" value="{{ $orderedItem->quantity ?? 1 }}" min="1">
            </div>
            @endforeach
        </div>

        {{-- Shipping --}}
        <div class="mb-3 mt-3">
            <label>Shipping Address</label>
            <textarea name="shipping_address" class="form-control">{{ $order->shipping_address }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
</div>
@endsection
