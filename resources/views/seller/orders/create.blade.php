@extends('seller.layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Create New Order</h2>

    <form action="{{ route('seller.orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="buyer_id" class="form-label">Select Buyer</label>
            <select name="buyer_id" id="buyer_id" class="form-control" required>
                @foreach(App\Models\User::all() as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <h5>Products</h5>
        <div id="productsWrapper">
            @foreach($products as $product)
            <div class="mb-2 d-flex align-items-center">
                <input type="checkbox" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
                <label class="ms-2">{{ $product->name }} - ₹{{ $product->price }}</label>
                <input type="number" name="products[{{ $product->id }}][quantity]" class="form-control ms-2" style="width:80px;" value="1" min="1">
            </div>
            @endforeach
        </div>

        <div class="mb-3 mt-3">
            <label for="shipping_address" class="form-label">Shipping Address</label>
            <textarea name="shipping_address" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="billing_address" class="form-label">Billing Address</label>
            <textarea name="billing_address" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
</div>
@endsection
