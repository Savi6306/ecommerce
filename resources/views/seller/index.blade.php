<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  @extends('layouts.app')

@section('content')
  @include('layouts.navbar')

  <!-- Hero Banner Section -->
<section class="hero-banner d-flex align-items-center text-white"
         style="background: url('{{ asset('images/banner1.png') }}') center/cover no-repeat; min-height: 80vh; position: relative;">

    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: rgba(0,0,0,0.55);"></div>

    <!-- Content -->
    <div class="container position-relative z-2">
      <div class="row align-items-center">
        
        <!-- Left Content -->
        <div class="col-lg-7">
          <h1 class="fw-bold display-4 mb-3">
            Sell online to Crores of Customers at <span class="text-warning">0% Commission</span>
          </h1>
          <p class="lead mb-4">
            Become a PGMS seller and grow your business across India 🚀
          </p>
          <a href="{{ route('seller.startSelling') }}" 
             class="btn btn-light btn-lg px-5 fw-bold rounded-pill shadow">
            Start Selling
          </a>
        </div>


      </div>
    </div>
</section>


  <!-- Features Cards Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-4 g-4">

        <!-- Card 1 -->
        <div class="col">
          <div class="card h-100 shadow-sm text-center feature-card">
          
            <div class="card-body">
              <h5 class="card-title" style ="font-size:20px">Lakhs of</h5>
              <p class="card-text">Sellers trust PGMS to sell online</p>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col">
          <div class="card h-100 shadow-sm text-center feature-card">
           
            <div class="card-body">
              <h5 class="card-title">Crores of</h5>
              <p class="card-text">Customers buying across India</p>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col">
          <div class="card h-100 shadow-sm text-center feature-card">
            
            <div class="card-body">
              <h5 class="card-title">Thousands of</h5>
              <p class="card-text">Connect with crores of customers across India and grow your brand faster.</p>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col">
          <div class="card h-100 shadow-sm text-center feature-card">
            
            <div class="card-body">
              <h5 class="card-title">Hundreds of</h5>
              <p class="card-text">Categories to sell online</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<!-- Promo Section: Content Left + Card Right -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">

      <!-- Left Side Content -->
      <div class="col-md-6">
        <h2 class="fw-bold mb-3">Why Suppliers Love PGMS 🌟</h2>
        <p class="lead">
          PGMS brings you lakhs of trusted sellers, crores of happy customers, and 
          a seamless shopping experience across India. Whether you're buying or selling, 
          PGMS makes it effortless.
        </p>
        
      </div>

      <!-- Right Side Card -->
      <div class="col-md-6">
        <div class="card feature-card shadow-sm p-4">
          <div class="card-body">

            <!-- Feature 1 -->
            <div class="d-flex align-items-start mb-4">
              <img src="{{ asset('images/icons/icon-10.svg') }}" alt="0% Commission" width="40" class="me-3">
              <div>
                <h5 class="fw-bold">0% Commission Fee</h5>
                <p class="mb-0">Suppliers selling on PGMS keep <b>100% of their profit</b> by not paying any commission.</p>
              </div>
            </div>

            <!-- Feature 2 -->
            <div class="d-flex align-items-start mb-4">
              <img src="{{ asset('images/icons/icon-16.svg') }}" alt="0 Penalty Charges" width="40" class="me-3">
              <div>
                <h5 class="fw-bold">0 Penalty Charges</h5>
                <p class="mb-0">Sell online without the fear of cancellation fees — enjoy <b>0 Penalty</b> for late dispatch or cancellations.</p>
              </div>
            </div>

            <!-- Feature 3 -->
            <div class="d-flex align-items-start mb-4">
              <img src="{{ asset('images/icons/icon-11.svg') }}" alt="Growth for Suppliers" width="40" class="me-3">
              <div>
                <h5 class="fw-bold">Growth for Every Supplier</h5>
                <p class="mb-0">From small to large and unbranded to branded, PGMS fuels growth for all — even those <b>without a Regular GSTIN</b>.</p>
              </div>
            </div>

            <!-- Feature 4 -->
            <div class="d-flex align-items-start">
              <img src="{{ asset('images/icons/icon-12.svg') }}" alt="Ease of Business" width="40" class="me-3">
              <div>
                <h5 class="fw-bold">Ease of Doing Business</h5>
                <ul class="mb-0 list-unstyled">
                  <li>✅ Easy Product Listing</li>
                  <li>✅ Lowest Cost Shipping</li>
                  <li>✅ 7-Day Payment Cycle</li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- How It Works Section -->
<section class="py-5 how-it-works">
  <div class="container">
    <h2 class="fw-bold text-center mb-5 text-olive-dark">How It Works</h2>
    <div class="row row-cols-1 row-cols-md-5 g-4 text-center">

      <!-- Step 1 -->
      <div class="col">
        <div class="card h-100 shadow-sm feature-step">
          <div class="card-body">
            <div class="step-circle mx-auto mb-3">1</div>
            <h5 class="fw-bold">Create Account</h5>
            <p class="small mb-0">
              All you need is:<br>
              GSTIN / Enrolment ID / UIN<br>
              Bank Account
            </p>
          </div>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="col">
        <div class="card h-100 shadow-sm feature-step">
          <div class="card-body">
            <div class="step-circle mx-auto mb-3">2</div>
            <h5 class="fw-bold">List Products</h5>
            <p class="small mb-0">List the products you want to sell in your supplier panel.</p>
          </div>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="col">
        <div class="card h-100 shadow-sm feature-step">
          <div class="card-body">
            <div class="step-circle mx-auto mb-3">3</div>
            <h5 class="fw-bold">Get Orders</h5>
            <p class="small mb-0">Start getting orders from crores of Indians actively shopping.</p>
          </div>
        </div>
      </div>

      <!-- Step 4 -->
      <div class="col">
        <div class="card h-100 shadow-sm feature-step">
          <div class="card-body">
            <div class="step-circle mx-auto mb-3">4</div>
            <h5 class="fw-bold">Affordable Shipping</h5>
            <p class="small mb-0">Enjoy affordable shipping to customers across India.</p>
          </div>
        </div>
      </div>

      <!-- Step 5 -->
      <div class="col">
        <div class="card h-100 shadow-sm feature-step">
          <div class="card-body">
            <div class="step-circle mx-auto mb-3">5</div>
            <h5 class="fw-bold">Receive Payments</h5>
            <p class="small mb-0">Payments reach your bank within 7 days of delivery.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@include('layouts.footer')

  <!-- Custom CSS -->
<style>
.feature-card {
  background-color: #f9faf6;           /* halka olive base */
  border: 2px solid #009688;          /* olive green border */
  border-radius: 15px;
  transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease, color 0.3s ease;
  padding: 20px;
}

.feature-card h5 {
  color: #009688;                     /* olive heading */
  font-weight: bold;
}

.feature-card p {
  font-weight:bold;
  color: #333;                        /* readable text */
  font-size: 15px;
}

.feature-card:hover {
  transform: translateY(-8px);
  box-shadow: 0px 10px 25px rgba(85, 107, 47, 0.4); /* olive glow */
  background-color: #009688;          /* olive fill on hover */
}

.feature-card:hover h5,
.feature-card:hover p {
  color: #fff;                        /* white text on hover */
}


/* How It Works Section */
/* Olive theme colors */
:root {
  --olive-light: #f4f6ef;
  --olive-base: #6b8e23;
  --olive-dark: #556B2F;
}

/* Section background */
.how-it-works {
  background-color: var(--olive-light);
}

/* Heading color */
.text-olive-dark {
  color: #009688;
}

/* Card styling */
.feature-step {
  border: 2px solid #009688;
  border-radius: 15px;
  background-color: #fff;
  transition: all 0.3s ease;
}

.feature-step h5 {
  color: #009688;
}

.feature-step:hover {
  background-color: #009688;
  color: #fff;
  transform: translateY(-6px);
  box-shadow: 0px 10px 20px rgba(85, 107, 47, 0.4);
}

.feature-step:hover h5 {
  color: #fff;
}

/* Step number circle */
.step-circle {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background-color: #009688;
  color: #fff;
  font-size: 20px;
  font-weight: bold;
  display: flex;
  align-items: center;
  justify-content: center;
}



</style>
@endsection

</body>
</html>
  
