@extends('layout.app')

@section('content')
<div class="container my-5">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-success">🎉 Exclusive Offers & Deals</h1>
        <p class="text-muted">Grab the best discounts before they’re gone! Limited-time deals curated just for you.</p>
    </div>

    <!-- Offer Cards -->
    <div class="row g-4">
        <!-- Offer 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 offer-card h-100">
                <img src="https://img.freepik.com/free-vector/sale-banner-template_1361-1247.jpg" class="card-img-top rounded-top" alt="Offer 1">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-dark">Flat 50% Off on Electronics ⚡</h5>
                    <p class="text-muted mb-3">Upgrade your gadgets with unbeatable prices on top brands.</p>
                    <span class="badge bg-success">Valid till: 31 Oct 2025</span>
                    <div class="mt-3">
                        <a href="/" class="btn btn-outline-success btn-sm">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Offer 2 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 offer-card h-100">
                <img src="https://img.freepik.com/free-vector/fashion-sale-banner-template_23-2148670371.jpg" class="card-img-top rounded-top" alt="Offer 2">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-dark">Buy 1 Get 1 Free 👗</h5>
                    <p class="text-muted mb-3">Exclusive fashion sale on Pushpendra Mart — shop your favourites now!</p>
                    <span class="badge bg-danger">Valid till: 25 Oct 2025</span>
                    <div class="mt-3">
                        <a href="/" class="btn btn-outline-danger btn-sm">Explore Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Offer 3 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 offer-card h-100">
                <img src="https://img.freepik.com/free-vector/mega-sale-discount-banner-template_1017-31297.jpg" class="card-img-top rounded-top" alt="Offer 3">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-dark">Mega Festive Sale 🎊</h5>
                    <p class="text-muted mb-3">Save big on home appliances and daily essentials this festive season.</p>
                    <span class="badge bg-warning text-dark">Valid till: 10 Nov 2025</span>
                    <div class="mt-3">
                        <a href="/" class="btn btn-outline-warning btn-sm">Grab Deal</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Offer 4 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 offer-card h-100">
                <img src="https://img.freepik.com/free-vector/online-shopping-concept-illustration_114360-1084.jpg" class="card-img-top rounded-top" alt="Offer 4">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-dark">₹200 Cashback on First Order 💸</h5>
                    <p class="text-muted mb-3">Sign up and get instant cashback on your first purchase with us.</p>
                    <span class="badge bg-primary">Valid for New Users</span>
                    <div class="mt-3">
                        <a href="/" class="btn btn-outline-primary btn-sm">Get Cashback</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Offer 5 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 offer-card h-100">
                <img src="https://img.freepik.com/free-vector/super-sale-discount-banner-template_1017-30139.jpg" class="card-img-top rounded-top" alt="Offer 5">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-dark">Weekend Flash Sale ⏰</h5>
                    <p class="text-muted mb-3">Massive discounts on top categories — only this weekend!</p>
                    <span class="badge bg-secondary">Valid till: Sunday</span>
                    <div class="mt-3">
                        <a href="/" class="btn btn-outline-secondary btn-sm">Shop Flash Sale</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Offer 6 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 offer-card h-100">
                <img src="https://img.freepik.com/free-vector/special-offer-sale-banner-template_1017-31285.jpg" class="card-img-top rounded-top" alt="Offer 6">
                <div class="card-body text-center">
                    <h5 class="fw-bold text-dark">Special Offer for PGMS Members 🏅</h5>
                    <p class="text-muted mb-3">Members enjoy extra discounts and early access to new deals.</p>
                    <span class="badge bg-dark">Exclusive Members Only</span>
                    <div class="mt-3">
                        <a href="/" class="btn btn-outline-dark btn-sm">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
<div class="alert alert-info text-center">
   <a href="{{ route('home') }}" class="text-success fw-bold">Continue shopping!</a>
            </div>

    </div>
</div>

<!-- Page Styling -->
<style>
.offer-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.offer-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}
</style>
@endsection
