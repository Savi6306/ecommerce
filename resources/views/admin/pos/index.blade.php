@extends('admin.layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        {{-- Left Side: Products --}}
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>🛒 POS - Product Selection</h4>
                <form action="{{ route('admin.pos.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search product...">
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row g-3">
                @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/no-image.png') }}"
                                 class="card-img-top" style="height:160px; object-fit:cover;">
                            <div class="card-body text-center">
                                <h6 class="mb-1">{{ Str::limit($product->name, 20) }}</h6>
                                <p class="text-success fw-bold mb-2">₹{{ $product->price ?? 0 }}</p>

                                {{-- Add to Cart Button --}}
                                <a href="{{ route('admin.pos.add', $product->id) }}" 
                                   class="btn btn-sm btn-success w-100">
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>

        {{-- Right Side: Cart --}}
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">🧾 Current Cart</h5>
                </div>
                <div class="card-body">
                    @if($cart && count($cart) > 0)
                        @foreach($cart as $seller_id => $items)
                            <div class="card mb-2">
                                <div class="card-header">
                                    Seller: {{ \App\Models\Seller::find($seller_id)->name ?? 'N/A' }}
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach($items as $product_id => $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
 <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/default-product.png') }}"
     alt="Product"
     width="60"
     height="60"
     class="rounded">
                                                <div>
                                                    <strong>{{ $item['name'] }}</strong><br>
                                                    ₹{{ $item['price'] ?? 0 }} x {{ $item['quantity'] ?? 1 }}
                                                </div>
                                            </div>
                                            <a href="{{ route('admin.pos.remove', [$seller_id, $product_id]) }}"
                                               class="btn btn-danger btn-sm">X</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5>Total:</h5>
                            <h5 class="text-success fw-bold">₹{{ $total ?? 0 }}</h5>
                        </div>

                        <a href="{{ route('admin.pos.checkout') }}" class="btn btn-success w-100">Checkout All</a>
                    @else
                        <p class="text-center text-muted">No items in cart</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
