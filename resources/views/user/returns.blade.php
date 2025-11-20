@extends('layout.app')

@section('content')
<div class="container my-5">

    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color:#009688;">Return & Refund Policy</h1>
        <p class="text-muted fs-5">
            At <strong>PGMS (Pushpendra Global Mart Solutions)</strong>, customer satisfaction is our top priority.  
            Please read our detailed return, refund, and exchange policy before making a purchase.
        </p>
    </div>

    <!-- Policy Section -->
    <div class="row g-4">

        <div class="col-md-6">
            <div class="policy-card card border-0 p-4 h-100">
                <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-box-open fa-2x me-3" style="color:#009688;"></i>
                    <h4 class="fw-bold mb-0" style="color:#009688;">1. Returns</h4>
                </div>
                <p class="text-secondary">
                    You may return most new, unopened items within <strong>7 days of delivery</strong> for a full refund or replacement.
                    The item must be in its original packaging, unused, and in the same condition you received it.
                </p>
                <ul class="text-secondary mb-0">
                    <li>Product must include all original tags and accessories.</li>
                    <li>Shipping charges (if any) are non-refundable.</li>
                    <li>Return pickup may take 3–5 working days after approval.</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="policy-card card border-0 p-4 h-100">
                <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-arrows-rotate fa-2x me-3" style="color:#009688;"></i>
                    <h4 class="fw-bold mb-0" style="color:#009688;">2. Exchanges</h4>
                </div>
                <p class="text-secondary">
                    We offer hassle-free exchanges for defective or incorrect products.  
                    Requests must be made within <strong>7 days of delivery</strong>.  
                    Once verified, the replacement will be shipped at no extra cost.
                </p>
                <ul class="text-secondary mb-0">
                    <li>Exchange available only for the same product type.</li>
                    <li>Color or size change is possible based on stock availability.</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="policy-card card border-0 p-4 h-100">
                <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-money-bill-wave fa-2x me-3" style="color:#009688;"></i>
                    <h4 class="fw-bold mb-0" style="color:#009688;">3. Refunds</h4>
                </div>
                <p class="text-secondary">
                    After receiving and inspecting the returned product, your refund will be processed within  
                    <strong>5–7 business days</strong>. Refunds are issued to the original payment method only.
                </p>
                <ul class="text-secondary mb-0">
                    <li>Credit/debit card refunds may take additional bank processing time.</li>
                    <li>COD orders will receive refunds via bank transfer.</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="policy-card card border-0 p-4 h-100">
                <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-ban fa-2x me-3" style="color:#009688;"></i>
                    <h4 class="fw-bold mb-0" style="color:#009688;">4. Non-returnable Items</h4>
                </div>
                <ul class="text-secondary mb-0">
                    <li>Personal care, health, or hygiene products (e.g., cosmetics, skincare).</li>
                    <li>Gift cards and digital/downloadable items.</li>
                    <li>Customized, perishable, or clearance sale products.</li>
                </ul>
            </div>
        </div>

    </div>

    <!-- Additional Info -->
    <div class="mt-5 text-secondary">
        <h4 class="fw-bold" style="color:#009688;">Important Notes:</h4>
        <ul>
            <li>Always record unboxing videos to support your return/exchange claims.</li>
            <li>Items returned without prior approval may not be accepted.</li>
            <li>PGMS reserves the right to deny a return if the product is found used or damaged.</li>
        </ul>
    </div>

    <!-- Contact Support -->
    <div class="text-center mt-4">
        <p class="text-muted mb-2">Need assistance with a return or refund?</p>
        <a href="{{ url('/contact') }}" class="btn text-white px-4 py-2 fw-bold" style="background-color:#009688; border-radius:30px;">
            <i class="fa-solid fa-headset me-2"></i>Contact Support
        </a>
    </div>

    <!-- Back Button -->
    <div class="text-center mt-5 mb-3">
        <a href="{{ route('home') }}" class="btn text-white px-4 py-2 fw-bold" style="background-color:#009688; border-radius:30px;">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Home
        </a>
    </div>
</div>

<!-- Custom Styles -->
<style>
.policy-card {
    background-color: #e9f7f6; /* light grey */
    border-radius: 12px;
    transition: all 0.3s ease;
}
.policy-card:hover {
    background-color: #44b1a9ff; /* very light teal tint */
    transform: translateY(-6px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-left: 4px solid #009688;
}
</style>
@endsection
