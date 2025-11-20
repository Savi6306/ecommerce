<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    @extends('layouts.app')

@section('content')
  @include('layouts.navbar')

  <!-- Hero Section with Half Background -->
  <section class="position-relative text-white" 
           style="background: url('{{ asset('images/pricing.png') }}') no-repeat center center/cover; min-height: 50vh; padding-top: 100px; padding-bottom: 80px;">
    
    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: rgba(0,0,0,0.55);"></div>

    <div class="container px-4 position-relative">
      <div class="row align-items-center" style="min-height: 50vh;">
        
        <!-- Left Side: Text + Form -->
        <div class="col-lg-6">
          <h1 class="display-4 fw-bold mb-3 text-white">Pricing & Commission</h1>
          <p class="fs-4 mb-4">PGMS charges 0% Commission rate across all categories, allowing sellers to retain their full earnings on every sale. 🚀</p>
          
          <!-- Card -->
          
                  
                  <a href="{{ route('seller.startSelling') }}" 
             class="btn btn-light btn-lg px-5 fw-bold rounded-pill shadow">
            Start Selling
          </a>
          </div>
        </div>

        <!-- Right Side (Empty for spacing) -->
        <div class="col-lg-6"></div>

      </div>
    </div>
  </section>


  
<!--cards2 section-->
<div class="container py-5">
  

  <div class="row g-4">

    <!-- Card 1 -->
    <div class="col-md-4">
      <div class="feature-card text-center p-4 h-100">
        <div class="icon-circle bg-light-success mb-3 mx-auto">
          <i class="bi bi-person-check"></i>
        </div>
        <h5 class="fw-bold">No Registration Fee</h5>
        <p class="text-muted">
          Registering as a seller is <strong>100% free</strong> — no cost for account creation or product listing.
        </p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-4">
      <div class="feature-card text-center p-4 h-100">
        <div class="icon-circle bg-light-primary mb-3 mx-auto">
          <i class="bi bi-cash-stack"></i>
        </div>
        <h5 class="fw-bold">No Collection Fee</h5>
        <p class="text-muted">
          You keep <strong>100% of the sale price</strong> — no charges for payment gateway or COD orders.
        </p>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-4">
      <div class="feature-card text-center p-4 h-100">
        <div class="icon-circle bg-light-warning mb-3 mx-auto">
          <i class="bi bi-shield-check"></i>
        </div>
        <h5 class="fw-bold">No Penalty</h5>
        <p class="text-muted">
          Grow your business without worrying about penalties or hidden charges.
        </p>
      </div>
    </div>

  </div>
</div>

  <!---Payment Cycle--->

<div class="container py-5 payment-section">
  <div class="row align-items-center">

    <!-- Left Side: Text -->
    <div class="col-md-6 mb-4 mb-md-0">
      <h2 class="fw-bold">Payment Cycle</h2>
      <p class="text-muted">
        The settlement amount is securely deposited directly into your bank account 
        following a <strong>7-day payment cycle</strong> from order delivery, including cash on delivery orders.
      </p>
      <p class="text-muted">
        You can view your deposited balance and the upcoming payments on the Supplier Panel.
      </p>
    </div>

    <!-- Right Side: Features -->
    <div class="col-md-6">
      <div class="row g-4">

        <!-- Feature 1 -->
        <div class="col-12">
          <div class="d-flex align-items-start payment-feature">
            <div class="me-3">
              <i class="bi bi-calendar-check text-primary"></i>
            </div>
            <div>
              <h5 class="fw-bold mb-2">7-Day Payment Cycle</h5>
              <p class="text-muted mb-0">
                All your orders (including COD) are settled within 7 days of delivery.
              </p>
            </div>
          </div>
        </div>

        <!-- Feature 2 -->
        <div class="col-12">
          <div class="d-flex align-items-start payment-feature">
            <div class="me-3">
              <i class="bi bi-shield-lock text-success"></i>
            </div>
            <div>
              <h5 class="fw-bold mb-2">Secured Payment in Your Account</h5>
              <p class="text-muted mb-0">
                Settlement amount is safely transferred directly into your bank account.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>
<!---Quick Facts on Shipping & Delivery-->


<div class="container py-5">

  <!-- Shipping Section -->
  <div class="row align-items-center mb-5">
    <div class="col-12 text-center mb-4">
      <h2 class="fw-bold">Quick Facts on Shipping & Delivery</h2>
      <div class="heading-underline mx-auto"></div>
    </div>

<!-- Content Row -->
  <div class="row align-items-center mt-4"> 
        <!-- Left Side --> 
         <div class="col-md-6"> 
            <h5 class="fw-bold">🚚 Shipping</h5> 
            <p class="text-muted"> PGMS shipping service allows you to focus on selling, 
                while we take care of the shipping and delivery with only
                 <strong>18% GST</strong> on the shipping charges. 
                 You can sell your products to crores of PGMS customers, 
                 schedule delivery with access to tens of thousands of local couriers, and have the 
                 flexibility to set your own prices. </p>
                 </div> 
                 <!-- Right Side: Image --> 
                  <div class="col-md-6 text-center"> 
                    <img src="{{ asset('images/shipping.png') }}" alt="Shipping Delivery" class="img-fluid img-circle shadow">
                 </div> 
                </div>
             </div>

  <!-- Return Policy Section -->
  <div class="row align-items-center mb-5">
    <!-- Left: Image -->
    <div class="col-md-6 text-center mb-4 mb-md-0">
      <img src="{{ asset('images/Return.png') }}" alt="Return Policy" class="img-fluid img-circle shadow">
    </div>

    <!-- Right: Content -->
    <div class="col-md-6">
      <h2 class="fw-bold mb-3">PGMS Return Policy</h2>
      <div class="heading-underline mx-auto"></div>
      <p class="text-muted">
        The PGMS Supplier Panel provides visibility for returns on your inventory. 
        You can make adjustments in real-time and deliver a great customer experience 
        while minimizing your returns.
      </p>
      <p class="text-muted">
        Use the Supplier Panel to manage your returns and reduce your processing costs effectively.
      </p>
    </div>
  </div>

  <!-- Cancellation Section -->
  <div class="row align-items-center mb-5">
    <!-- Left: Content -->
    <div class="col-md-6">
      <h2 class="fw-bold mb-3">Cancellation</h2>
      <div class="heading-underline mx-auto"></div>
      <p class="text-muted">
        PGMS charges <strong>0 penalties</strong> for supplier cancellations and auto cancellations. 
        Even if an order cannot be fulfilled due to lack of inventory or other situations, 
        you can conduct business without worrying about penalties.
      </p>
    </div>

    <!-- Right: Image -->
    <div class="col-md-6 text-center mb-4 mb-md-0">
      <img src="{{ asset('images/fact-3-p-500.png') }}" alt="Cancellation Policy" class="img-fluid img-circle shadow">
    </div>
  </div>

  <!-- Return to Origin (RTO) Section -->
  <div class="row align-items-center mb-5">
    <!-- Left: Image -->
    <div class="col-md-6 text-center mb-4 mb-md-0">
      <img src="{{ asset('images/fact-2.png') }}" alt="Return to Origin"  class="img-fluid img-circle shadow">
    </div>

    <!-- Right: Content -->
    <div class="col-md-6">
      <h2 class="fw-bold mb-3">Return to Origin (RTO)</h2>
      <div class="heading-underline mx-auto"></div>
      <p class="text-muted">
        The shipping partner will try <strong>three times</strong> to reach the customer. 
        If the customer does not accept the product, it will be returned to you.
      </p>
      <p class="text-muted">
        PGMS will not charge a <strong>return shipping fee</strong> for any RTOs, 
        ensuring you can run your business tension-free.
      </p>
    </div>
  </div>

</div>
@include('layouts.footer')
<!-- Custom CSS -->



<!---style cards section-->

<style>
    /* Feature card design */
.feature-card {
  background: #fff;
  border-radius: 20px;
  transition: all 0.3s ease-in-out;
  border: 1px solid #f1f1f1;
  box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}
.feature-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

/* Icon circle style */
.icon-circle {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  font-size: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.3s;
}

/* Light backgrounds for each theme */
.bg-light-success { background-color: #e6f9f0; color: #28a745; }
.bg-light-primary { background-color: #eaf2ff; color: #007bff; }
.bg-light-warning { background-color: #fff6e6; color: #ffc107; }

.icon-circle i {
  font-size: 32px;
}


/* payment cycle*/

/* Section background */
.payment-section {
  background: linear-gradient(135deg, #f8fbff, #f1f9f6);
  border-radius: 15px;
  padding: 60px 30px;
}

/* Heading styling */
.payment-section h2 {
  font-size: 2rem;
  color: #222;
}

/* Feature box styling */
.payment-feature {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.06);
  padding: 20px;
  transition: all 0.3s ease;
}

.payment-feature:hover {
  transform: translateY(-6px);
  box-shadow: 0 6px 20px rgba(0,0,0,0.12);
}

/* Icon circle */
.payment-feature i {
  background: #f1f5ff;
  border-radius: 50%;
  padding: 12px;
  font-size: 32px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}
.text-primary {
  color: #007bff !important;
}
.text-success {
  color: #28a745 !important;
}


/*Quick Facts on Shipping & Delivery*/
.heading-underline {
  width: 80px;
  height: 4px;
  background: linear-gradient(90deg, #007bff, #00c851);
  border-radius: 2px;
  margin-top: 8px;
}

h2.fw-bold {
  color: #222;
 
}

h5.fw-bold {
  color: #007bff; /* blue tone for highlight */
}

.text-muted {
  line-height: 1.7;
  font-size: 1rem;
}
.img-circle {
  width: 200px;        /* adjust size as needed */
  height: 200px;       /* same as width for perfect circle */
  object-fit: cover;   /* ensures the image scales and crops nicely */
  border-radius: 50%;  /* makes it circular */
  transition: transform 0.3s ease;
}

.img-circle:hover {
  transform: scale(1.05);
}

</style>

@endsection

</body>
</html>
