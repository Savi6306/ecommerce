@extends('layouts.app')

@section('content')
  @include('layouts.navbar')

  <!-- Hero Section with Half Background -->
  <section class="position-relative text-white" 
           style="background: url('{{ asset('images/shipping-returns.webp') }}') no-repeat center center/cover; min-height: 50vh; padding-top: 100px; padding-bottom: 80px;">
    
    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: rgba(0,0,0,0.55);"></div>

    <div class="container px-4 position-relative">
      <div class="row align-items-center" style="min-height: 50vh;">
        
        <!-- Left Side: Text + Form -->
        <div class="col-lg-6">
          <h3 class="display-4 fw-bold mb-3 text-white">PGMS Shipping, Delivery & Returns Policy</h3>
          <p class="fs-4 mb-4">Get your products delivered to crores of customers with the cost-effective shipping.. 🚀</p>
          
          <!-- Card -->
          <a href="{{ route('seller.startSelling') }}" 
             class="btn btn-light btn-lg px-5 fw-bold rounded-pill shadow">
            Start Selling
          </a>
</div>
          </div>
        </div>

        <!-- Right Side (Empty for spacing) -->
        <div class="col-lg-6"></div>

      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        
        <!-- Left Side -->
        <div class="col-md-6 mb-4 mb-md-0">
          <h2 class="fw-bold">Deliver products across India</h2>
          <p class="lead text-muted">
            PGMS ensures quick and hassle-free delivery of all your products across India 🚚
          </p>
        </div>

        <!-- Right Side (Feature Cards with Images) -->
        <div class="col-md-6">
          <div class="row g-3">
            
            <!-- Feature 1 -->
            <div class="col-4">
              <div class="card shadow-sm border-0 text-center h-100 p-3">
                <img src="{{ asset('images/icons/icon-19.svg') }}" 
                     class="img-fluid mx-auto mb-2" 
                     alt="Cost-Effective Shipping" 
                     style="width:60px; height:60px;">
                <h6 class="fw-bold mb-0">Cost-Effective</h6>
                <small class="text-muted">Affordable shipping</small>
              </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-4">
              <div class="card shadow-sm border-0 text-center h-100 p-3">
                <img src="{{ asset('images/icons/icon-20.svg') }}" 
                     class="img-fluid mx-auto mb-2" 
                     alt="Pan-India Delivery" 
                     style="width:60px; height:60px;">
                <h6 class="fw-bold mb-0">Pan-India Delivery</h6>
                <small class="text-muted">Across all cities</small>
              </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-4">
              <div class="card shadow-sm border-0 text-center h-100 p-3">
                <img src="{{ asset('images/icons/icon-15.svg') }}" 
                     class="img-fluid mx-auto mb-2" 
                     alt="0% Commission" 
                     style="width:60px; height:60px;">
                <h6 class="fw-bold mb-0">0% Commission</h6>
                <small class="text-muted">Keep full profit</small>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Shipping, Returns & Policies -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row">
        
        <!-- Left Sidebar (Menu) -->
        <div class="col-md-4 mb-4">
          <div class="list-group shadow-sm">
            <a href="#shipping-works" class="list-group-item list-group-item-action active" data-bs-toggle="list">
              <i class="bi bi-truck me-2"></i> How Shipping Works
            </a>
            <a href="#shipping-timeline" class="list-group-item list-group-item-action" data-bs-toggle="list">
              <i class="bi bi-calendar-check me-2"></i> Shipping Timeline
            </a>
            <a href="#return-policy" class="list-group-item list-group-item-action" data-bs-toggle="list">
              <i class="bi bi-arrow-counterclockwise me-2"></i> Return Policy
            </a>
            <a href="#cancellation-policy" class="list-group-item list-group-item-action" data-bs-toggle="list">
              <i class="bi bi-x-circle me-2"></i> Cancellation Policy
            </a>
            <a href="#charges" class="list-group-item list-group-item-action" data-bs-toggle="list">
              <i class="bi bi-cash-coin me-2"></i> Shipping & Delivery Charges
            </a>
          </div>
        </div>

        <!-- Right Side (Details) -->
        <div class="col-md-8">
          <div class="tab-content p-4 bg-white shadow-sm rounded">
            
            <!-- How Shipping Works -->
            <div class="tab-pane fade show active" id="shipping-works">
              <h4 class="fw-bold mb-3">How Shipping Works</h4>
              <p>
                PGMS partners with leading courier services to ensure safe and quick delivery of your products. 
                Once an order is placed, sellers pack the product, and PGMS courier partners pick it up directly 
                from the seller’s location and deliver it to the customer.
              </p>
            </div>

            <!-- Shipping Timeline -->
            <div class="tab-pane fade" id="shipping-timeline">
              <h4 class="fw-bold mb-3">Shipping Timeline</h4>
              <p>
                Most orders are shipped within 2–3 business days after confirmation. Customers can track their 
                orders in real-time through the PGMS app. Delivery timelines vary based on the destination city.
              </p>
            </div>

            <!-- Return Policy -->
            <div class="tab-pane fade" id="return-policy">
              <h4 class="fw-bold mb-3">Return Policy</h4>
              <p class="text-muted">
                Customers can return the product within 7 days from the date of delivery and the shipments which weren’t delivered to the customer get converted to an RTO (Return to Origin).
              </p>
              <br>
              <p class="text-muted">
                PGMS gives sellers all the information they need to manage their customer returns or RTOs (Return to Origin) along with details on compensation and charges levied for each return/RTO. We have comprehensive tools to help our sellers track and manage their returns, get order or product level data as well as detailed shipping tracking, payment and order history.
              </p>
              <div class="row align-items-center mb-5">
                <!-- Left: Content -->
                <div class="col-md-6">
                  <div class="heading-underline mx-auto mb-3">Return Shipping Fee</div>
                  <ul class="text-muted">
                    <li>If a customer returns a product, then the seller is charged a return shipping fee based on the weight of the shipment.</li>
                    <li>If an order is not delivered to a customer and gets converted to an RTO (Return to Origin), the seller will not be charged any additional fee for shipping.</li>
                    <li>All return & RTO related charges can be tracked & managed using different tools that are provided to PGMS sellers.</li>
                    <li>Please note that for some exceptional cases, the return shipping fees can be waived off.</li>
                  </ul>
                </div>

                <!-- Right: Image -->
                <div class="col-md-6 text-center">
                  <img src="{{ asset('images/Return.png') }}" 
                      alt="Return Policy" 
                      class="img-fluid rounded-circle shadow" 
                      style="width:250px; height:250px; object-fit:cover;">
                </div>
              </div>
            </div>

            <!-- Cancellation Policy -->
            <div class="tab-pane fade" id="cancellation-policy">
              <h4 class="fw-bold mb-3">Cancellation Policy</h4>
              <p>
                Orders can be cancelled by the customer before they are shipped. Once shipped, cancellations are 
                not allowed. In case of delays, customers may raise a support ticket.
              </p>

              <!-- Extra Cancellation Section -->
              <div class="row align-items-center mb-5">
                <!-- Left: Content -->
                <div class="col-md-6">
                 
                  <p class="text-muted">
                    PGMS charges <strong>0 penalties</strong> for supplier cancellations and auto cancellations. 
                    Even if an order cannot be fulfilled due to lack of inventory or other situations, 
                    you can conduct business without worrying about penalties.
                  </p>
                </div>

                <!-- Right: Image -->
                <div class="col-md-6 text-center mb-4 mb-md-0">
                  <img src="{{ asset('images/fact-3-p-500.png') }}" 
                      alt="Cancellation Policy" 
                      class="img-fluid rounded-circle shadow"
                      style="width:250px; height:250px; object-fit:cover;">
                </div>
              </div>
            </div>

            <!-- Shipping & Delivery Charges -->
            <div class="tab-pane fade" id="charges">
              <h4 class="fw-bold mb-3">Shipping & Delivery Charges</h4>
              <p>
                PGMS provides affordable shipping rates based on weight and delivery location. Sellers can check 
                detailed shipping charges in their dashboard.
              </p>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
  @include('layouts.footer')
@endsection 
