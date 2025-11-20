@extends('layouts.app')

@section('content')
  @include('layouts.navbar')

  <!-- Hero Section with Half Background -->
  <section class="position-relative text-white" 
           style="background: url('{{ asset('images/strat-selling.png') }}') no-repeat center center/cover; min-height: 50vh; padding-top: 100px; padding-bottom: 80px;">
    
    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: rgba(0,0,0,0.55);"></div>

    <div class="container px-4 position-relative">
      <div class="row align-items-center" style="min-height: 50vh;">
        
        <!-- Left Side: Text + Form -->
        <div class="col-lg-6">
          <h1 class="display-4 fw-bold mb-3 text-white">How to Sell on PGMS</h1>
          <p class="fs-4 mb-4">Become a seller and join thousands of sellers who are growing their business every day 🚀</p>
          
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


  <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-bold">Become a Seller on PGMS</h1>
                    <p class="lead">Start your online selling journey in 4 simple steps and grow your business with India's fastest growing e-commerce platform</p>
                </div>
            </div>
        </div>
</section>

    <!-- Process Steps Section -->
    <section class="process-section">
        <div class="container">
            <h2 class="section-title">Selling on PGMS in 4 Simple Steps</h2>
            
            <div class="row">
                <!-- Step 1 -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="step-card p-4">
                        <div class="step-number">1</div>
                        <div class="step-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3>Sign up for free</h3>
                        <p>Register as a PGMS Seller. All you need is an active bank account and your <span class="highlight">GSTIN number</span> (for GST sellers) or <span class="highlight">Enrolment ID / UIN</span> (for non-GST sellers).</p>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="step-card p-4">
                        <div class="step-number">2</div>
                        <div class="step-icon">
                            <i class="fas fa-upload"></i>
                        </div>
                        <h3>Upload your product catalog</h3>
                        <p>After completing the registration, upload your product catalog on the PGMS Supplier Panel with details and images.</p>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="step-card p-4">
                        <div class="step-number">3</div>
                        <div class="step-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h3>Receive & Ship Orders</h3>
                        <p>PGMS offers cost-effective shipping options for deliveries across India (for GST sellers) and within the state (for non-GST sellers).</p>
                    </div>
                </div>
                
                <!-- Step 4 -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="step-card p-4">
                        <div class="step-number">4</div>
                        <div class="step-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h3>Receive Payments</h3>
                        <p>Payment is securely deposited directly to your bank account on PGMS following a 7-day payment cycle from order delivery, including Cash on Delivery orders.</p>
                    </div>
                </div>
            </div>
            
            <div class="divider">
                <span class="divider-text">Start Your Selling Journey Today</span>
            </div>
            
            <!-- Benefits Section -->
            <div class="row mt-5">
                <div class="col-lg-10 mx-auto">
                    <h2 class="text-center mb-4">Why Sell on PGMS?</h2>
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <div class="p-3">
                                <i class="fas fa-rupee-sign fa-3x text-success mb-3"></i>
                                <h4>0% Commission</h4>
                                <p>Sell your products with zero commission charges</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <div class="p-3">
                                <i class="fas fa-shipping-fast fa-3x text-success mb-3"></i>
                                <h4>Pan-India Shipping</h4>
                                <p>Reach customers across India with our logistics network</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center mb-4">
                            <div class="p-3">
                                <i class="fas fa-users fa-3x text-success mb-3"></i>
                                <h4>70+ Million Customers</h4>
                                <p>Access to millions of active shoppers on our platform</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
<div class="container">
  <div class="cta-section">
    <h2 class="display-5 fw-bold">Ready to Start Selling?</h2>
    <p class="lead">Join thousands of sellers who are growing their business with PGMS</p>
    <a href="{{ route('seller.startSelling') }}" class="btn btn-light btn-lg">
      Register Now
    </a>
  </div>
</div>
@include('layouts.footer')


<!---style in become seller-->


<style>
    
        .hero-section {
            background: white;
            color:black;
            padding:2rem 0;
        }
        
        .step-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            border: none;
            overflow: hidden;
        }
        
        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(107,142,35,0.3); /* Olive glow */
        }
        
        .step-number {
            width: 50px;
            height: 50px;
            background:#009688; /* Olive green */
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .step-icon {
            font-size: 2.5rem;
            color:#009688;  /* Olive green */
            margin-bottom: 1.5rem;
        }
        
        .process-section {
            padding: 3rem 0;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #556B2F 0%, #6B8E23 100%); /* Olive gradient */
            border-radius: 2px;
        }
        
        .highlight {
            color:#009688; /* Olive green */
            font-weight: 600;
        }
        
        .cta-section {
            background: linear-gradient(135deg, #009688 0%, #009688 100%); /* Olive gradient */
            padding: 4rem 0;
            color: white;
            text-align: center;
            margin-top: 3rem;
            border-radius: 15px;
        }
        
        .btn-light {
            background-color: white;
            color:#009688;  /* Olive text */
            border: none;
            padding: 0.8rem 2.5rem;
            font-weight: 600;
            border-radius: 50px;
            margin-top: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .btn-light:hover {
            background-color: #f8f9fa;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 2rem 0;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 2px dashed #dee2e6;
        }
        
        .divider-text {
            padding: 0 1rem;
            color: #009688; /* Olive */
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .step-card {
                margin-bottom: 1.5rem;
            }
        }
    </style>

@endsection
