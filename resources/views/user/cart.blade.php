@extends('layout.app')

@section('content')
<div class="container my-5">

    {{-- ✅ If user not logged in, show message --}}
    @if(!Auth::guard('customer')->check())
        <div class="text-center my-5">
            <h4 class="text-danger">Please login first to continue shopping.</h4>
            <a href="/user/login" class="btn btn-success mt-3">Go to Login</a>
        </div>
    @else
        {{-- ✅ Normal cart content starts here --}}

        <h3 class="text-center mb-4">My Cart 🛒</h3>

        {{-- Success/Error Messages --}}
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        {{-- If cart empty --}}
        @if($cartItems->isEmpty())
            <div class="alert alert-info text-center">
                Your cart is empty. <a href="{{ route('home') }}" class="text-success fw-bold">Start shopping!</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-success text-center">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr class="text-center">
                                <td class="text-start d-flex align-items-center">
                                    @if($item->product)
                                        @php
                                            $imagePath = str_replace('public/', '', $item->product->image ?? '');
                                        @endphp

                                         <img src="{{ asset('storage/' . $imagePath) }}" 
         alt="{{ $item->product->name }}" 
         width="80" 
         class="rounded me-3 border shadow-sm">

                                        <div>
                                            <strong>{{ $item->product->name }}</strong><br>
                                            <small class="text-muted">{{ Str::limit($item->product->description, 40) }}</small>
                                        </div>
                                    @else
                                        {{-- ✅ Fallback if product deleted --}}
                                        <img src="{{ asset('images/no-image.png') }}" 
                                             alt="Product not available" 
                                             width="80" 
                                             class="rounded me-3 border shadow-sm">
                                        <div>
                                            <strong class="text-danger">Product removed</strong><br>
                                            <small class="text-muted">This product no longer exists.</small>
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    ₹{{ $item->product ? number_format($item->product->price, 2) : '0.00' }}
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button class="btn btn-sm btn-outline-secondary update-qty" data-id="{{ $item->id }}" data-change="-1">−</button>
                                        <input type="text" value="{{ $item->quantity }}" class="form-control text-center mx-2 quantity-input" data-id="{{ $item->id }}" style="width: 60px;">
                                        <button class="btn btn-sm btn-outline-secondary update-qty" data-id="{{ $item->id }}" data-change="1">+</button>
                                    </div>
                                </td>

                                <td>
                                    ₹{{ $item->product ? number_format($item->product->price * $item->quantity, 2) : '0.00' }}
                                </td>

                                <td>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Subtotal --}}
            <div class="text-end mt-4">
                <h5>Subtotal: <strong class="text-success">₹{{ number_format($subtotal, 2) }}</strong></h5>
                <a href="{{ route('checkout.index') }}" class="btn btn-primary mt-3">Proceed to Checkout</a>
            </div>
        @endif
    @endif
</div>

<style>
/* Keep your original green/teal color */
.btn-success {
    background-color: #008080;
    border-color: #008080;
}
.btn-success:hover {
    background-color: #006666;
    border-color: #006666;
}
.text-success {
    color: #008080 !important;
}
</style>

{{-- Optional JS for AJAX Quantity Update --}}
<script>
document.querySelectorAll('.update-qty').forEach(btn => {
    btn.addEventListener('click', function() {
        let id = this.dataset.id;
        let change = parseInt(this.dataset.change);
        let input = document.querySelector(`.quantity-input[data-id="${id}"]`);
        let newQty = parseInt(input.value) + change;
        if (newQty < 1) return;
        input.value = newQty;

        fetch(`/cart/update-quantity/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ quantity: newQty })
        }).then(res => res.json())
        .then(data => location.reload());
    });
});
</script>
@endsection
