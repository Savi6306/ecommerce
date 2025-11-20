@extends('layout.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center fw-bold mb-4 text-success"> My Wishlist💖</h2>

    {{-- ✅ If user is not logged in --}}
    @if(!Auth::check())
        <div class="text-center my-5">
            <h4 class="text-danger">Please login first to continue shopping.</h4>
            <a href="/user/login" class="btn btn-success mt-3">Go to Login</a>
        </div>

    {{-- ✅ If user is logged in --}}
    @else
        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if($wishlistItems->isEmpty())
            <div class="text-center mt-5">
                <h5 class="text-muted">Your wishlist is empty </h5>
                <a href="/" class="btn btn-success mt-3 px-4">Continue Shopping</a>
            </div>
        @else
            <div class="row g-4">
                @foreach($wishlistItems as $product)
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="card wishlist-card shadow-sm border-0 h-100">
                            <div class="wishlist-img-container">
                               <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         width="80" 
                         class="rounded me-3 border shadow-sm">
                                <a href="{{ route('wishlist.remove', $product->id) }}" class="remove-btn">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h6 class="card-title fw-bold text-dark">{{ $product->name }}</h6>
                                <p class="card-text text-muted mb-2">{{ Str::limit($product->description, 50) }}</p>
                                <h5 class="text-success mb-3">₹{{ number_format($product->price, 2) }}</h5>

                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ url('/buy-now/'.$product->id) }}" class="btn btn-sm btn-success px-3">
                                        <i class="fas fa-bolt"></i> Buy Now
                                    </a>
                                    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-sm btn-outline-primary px-3">
                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif
</div>

{{-- ✅ Modern Wishlist Styling --}}
<style>
    .wishlist-card {
        border-radius: 16px;
        transition: all 0.3s ease;
        overflow: hidden;
        background: #fff;
    }

    .wishlist-card:hover {
        transform: translateY(-6px);
        box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
    }

    .wishlist-img-container {
        position: relative;
        overflow: hidden;
    }

    .wishlist-img-container img {
        height: 220px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .wishlist-card:hover img {
        transform: scale(1.05);
    }

    .remove-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(255, 255, 255, 0.85);
        color: #dc3545;
        border-radius: 50%;
        padding: 8px 10px;
        font-size: 16px;
        transition: all 0.3s ease;
        opacity: 0;
    }

    .wishlist-card:hover .remove-btn {
        opacity: 1;
    }

    .remove-btn:hover {
        background: #dc3545;
        color: #fff;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }

    .btn-success, .btn-outline-primary {
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-success:hover {
        background-color: #28a745;
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .wishlist-card img {
            height: 180px;
        }
    }
</style>
@endsection
