@extends('layout.app')

@section('title', 'Shipping Information')

@section('content')
<div class="container my-5">
    {{-- Page Header --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color:#009688;">Shipping Information</h2>
        <p class="text-muted fs-5">Know everything about delivery, shipping charges, and return policy.</p>
        <div class="mt-3">
            <img src="/images/PGMS Logo.png" alt="PGMS Logo" width="80">
        </div>
    </div>

    {{-- Delivery Overview --}}
    <div class="card custom-card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold section-heading"><i class="bi bi-truck"></i> Delivery Overview</h5>
            <p class="text-secondary">
                At <strong>PGMS</strong>, we make sure your products are delivered safely and on time.
                Most orders are processed within <strong>24 hours</strong> and shipped through trusted courier partners.
            </p>
            <ul class="custom-list mt-3">
                <li><i class="bi bi-check-circle-fill text-success"></i> Standard delivery within <strong>3–7 business days</strong>.</li>
                <li><i class="bi bi-check-circle-fill text-success"></i> Express delivery available for selected locations.</li>
                <li><i class="bi bi-check-circle-fill text-success"></i> Track your order anytime from the <strong>My Orders</strong> section.</li>
            </ul>
        </div>
    </div>

    {{-- Address Policy --}}
    <div class="card custom-card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold section-heading"><i class="bi bi-geo-alt"></i> Shipping & Address Policy</h5>
            <p class="text-secondary">
                Please ensure your shipping address is complete and accurate to avoid any delivery delays. 
                You can manage or edit your saved addresses anytime from the 
                <a href="{{ route('user.addresses') }}" class="link">My Addresses</a> section.
            </p>

            <div class="info-box mt-3">
                <h6 class="fw-bold text-dark mb-2">Quick Tips:</h6>
                <ul class="mb-0">
                    <li>Double-check your PIN code for service availability.</li>
                    <li>Provide a landmark to help our delivery partner locate you easily.</li>
                    <li>Use a reachable contact number for delivery confirmation.</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Shipping Charges --}}
    <div class="card custom-card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold section-heading"><i class="bi bi-cash-coin"></i> Shipping Charges</h5>
            <p class="text-secondary">
                Shipping is <strong>free</strong> for all prepaid orders above ₹499. For lower-value or COD orders,
                a nominal fee is applied as below:
            </p>

            <table class="table table-striped mt-3 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Order Value</th>
                        <th>Shipping Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Below ₹499</td>
                        <td>₹49</td>
                    </tr>
                    <tr>
                        <td>₹499 and above</td>
                        <td><span class="text-success fw-bold">Free</span></td>
                    </tr>
                    <tr>
                        <td>Cash on Delivery (COD)</td>
                        <td>₹30 extra</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Returns --}}
    <div class="card custom-card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold section-heading"><i class="bi bi-arrow-repeat"></i> Returns & Replacements</h5>
            <p class="text-secondary">
                We offer a <strong>7-day hassle-free return policy</strong> for most items.
                Items must be unused, undamaged, and returned in their original packaging.
            </p>
            <ul class="custom-list">
                <li><i class="bi bi-check-circle-fill text-success"></i> Instant refund for prepaid orders.</li>
                <li><i class="bi bi-check-circle-fill text-success"></i> Exchange available for select items.</li>
                <li><i class="bi bi-check-circle-fill text-success"></i> Refunds processed within <strong>2–5 business days</strong>.</li>
            </ul>
        </div>
    </div>

    {{-- Support --}}
    <div class="card custom-card shadow-sm">
        <div class="card-body">
            <h5 class="fw-bold section-heading"><i class="bi bi-headset"></i> Need Help?</h5>
            <p class="text-secondary">
                Our support team is available <strong>24×7</strong> to help you with delivery, returns, and order queries.
            </p>
            <ul class="list-unstyled">
                <li><i class="bi bi-envelope text-primary"></i> indiapgms@gmail.com</li>
                <li><i class="bi bi-telephone text-primary"></i> +91-7060471592</li>
            </ul>
        </div>
    </div>
<div class="alert alert-info text-center">
   <a href="{{ route('home') }}" class="text-success fw-bold">Continue shopping!</a>
            </div>

</div>

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

{{-- Custom Styling --}}
<style>
.custom-card {
    border-radius: 18px;
    transition: all 0.3s ease;
    border: none;
}
.custom-card:hover {
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    transform: translateY(-3px);
}
.section-heading {
    color: #009688;
    border-left: 5px solid #009688;
    padding-left: 10px;
    margin-bottom: 15px;
}
.link {
    color: #009688;
    font-weight: 500;
}
.info-box {
    background-color: #e0f2f1;
    border-left: 4px solid #009688;
    padding: 15px;
    border-radius: 10px;
}
.custom-list li {
    margin-bottom: 8px;
    color: #555;
}
.container h2 {
    letter-spacing: 0.5px;
}
</style>
@endsection
