@extends('layout.app')

@section('content')
<div class="container my-5">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-success">🔥 Best Sellers</h1>
        <p class="text-muted">Our most loved products that everyone’s buying right now!</p>
    </div>

    <!-- Best Seller Cards -->
    <div class="row g-4">

        <!-- 1. Wireless Headphones -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 product-card h-100">
                <img src="{{ asset('images/headphone.webp') }}" class="card-img-top rounded-top" alt="Wireless Headphones">
                <div class="card-body text-center">
                    <h6 class="fw-bold text-dark">Wireless Headphones</h6>
                    <p class="text-muted mb-2">Crystal-clear sound and 24-hour battery life.</p>
                    <h5 class="text-success fw-bold mb-3">₹2,499</h5>
                    <a href="#" class="btn btn-outline-success btn-sm">View Product</a>
                </div>
                <div class="card-footer bg-light text-center small">⭐ 4.8 | 1.2k sold</div>
            </div>
        </div>

        <!-- 2. Stylish Sneakers -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 product-card h-100">
                <img src="{{ asset('images/sneakers.webp') }}" class="card-img-top rounded-top" alt="Stylish Sneakers">
                <div class="card-body text-center">
                    <h6 class="fw-bold text-dark">Stylish Sneakers</h6>
                    <p class="text-muted mb-2">Comfort meets fashion. Walk with confidence.</p>
                    <h5 class="text-success fw-bold mb-3">₹1,899</h5>
                    <a href="#" class="btn btn-outline-success btn-sm">View Product</a>
                </div>
                <div class="card-footer bg-light text-center small">⭐ 4.7 | 2.1k sold</div>
            </div>
        </div>

        <!-- 3. Smart Watch -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 product-card h-100">
                <img src="{{ asset('images/watch.webp') }}" class="card-img-top rounded-top" alt="Smart Watch">
                <div class="card-body text-center">
                    <h6 class="fw-bold text-dark">Smart Watch</h6>
                    <p class="text-muted mb-2">Track your fitness, heart rate, and calls.</p>
                    <h5 class="text-success fw-bold mb-3">₹3,299</h5>
                    <a href="#" class="btn btn-outline-success btn-sm">View Product</a>
                </div>
                <div class="card-footer bg-light text-center small">⭐ 4.9 | 3.8k sold</div>
            </div>
        </div>

        <!-- 4. Laptop Bag -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 product-card h-100">
                <img src="{{ asset('images/bag.webp') }}" class="card-img-top rounded-top" alt="Laptop Bag">
                <div class="card-body text-center">
                    <h6 class="fw-bold text-dark">Laptop Bag</h6>
                    <p class="text-muted mb-2">Durable, stylish, and water-resistant.</p>
                    <h5 class="text-success fw-bold mb-3">₹899</h5>
                    <a href="#" class="btn btn-outline-success btn-sm">View Product</a>
                </div>
                <div class="card-footer bg-light text-center small">⭐ 4.6 | 1.5k sold</div>
            </div>
        </div>

        </div>
    </div>
    <div class="alert alert-info text-center">
   <a href="{{ route('home') }}" class="text-success fw-bold">Continue shopping!</a>
            </div>
</div>

<!-- Page Styling -->
<style>
.product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}
</style>
@endsection
