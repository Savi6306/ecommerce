<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
     <link rel="icon" type="image/png" href="/images/PGMS Logo.png">
</head>
<body>
@extends('layout.app')

@section('content')

<!-- About Section -->
<section class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('images/AboutUsc.png') }}" alt="About PGMS" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold mb-3">Who We Are</h2>
            <p>
                Pushpendra Global Mart Solutions (PGMS) is a next-generation ecommerce platform 
                designed to connect multiple vendors with customers across India. 
                Our goal is to provide a seamless shopping experience with the widest 
                range of products at unbeatable prices.
            </p>
            <p>
                With a strong focus on customer satisfaction, we ensure safe payments, 
                fast delivery, and easy returns.
            </p>
        </div>
    </div>
</section>

<!-- Mission Vision Values -->
<section class="mission-vision-values py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Our Mission, Vision & Values</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="mvv-card">
          <h4>Mission</h4>
          <p>To empower vendors and provide customers with the best ecommerce experience.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mvv-card">
          <h4>Vision</h4>
          <p>To become India’s most trusted and innovative ecommerce marketplace.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="mvv-card">
          <h4>Values</h4>
          <p>Trust, Quality, Innovation, and Customer Satisfaction.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="why-choose py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-5">Why Choose PGMS?</h2>
    <div class="row g-4">
      
      <div class="col-md-3 col-6">
        <div class="why-card">
          <h5>Fast Delivery</h5>
          <p>Quick and reliable delivery at your doorstep.</p>
        </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="why-card">
          <h5>Easy Returns</h5>
          <p>7-day hassle-free returns for a better shopping experience.</p>
        </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="why-card">
          <h5>Secure Payments</h5>
          <p>100% safe and secure transactions with multiple payment options.</p>
        </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="why-card">
          <h5>Lowest Prices</h5>
          <p>Get the best deals and discounts on every product.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="text-center py-5 bg-success text-white">
    <h2 class="fw-bold">Start Shopping with PGMS Today!</h2>
    <p>Discover products from multiple vendors at the best prices.</p>
    <a href="{{ url('/') }}" class="btn btn-light fw-bold">Shop Now</a>
</section>

<!-- Custom CSS -->
<style>
.mvv-card {
  background: #fff;
  padding: 30px 20px;
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  height: 100%; /* Equal size cards */
  transition: all 0.3s ease;
}
.mvv-card h4 {
  font-weight: bold;
  margin-bottom: 15px;
  color: #009688; /* Teal (logo color) */
}
.mvv-card p {
  margin: 0;
  font-size: 15px;
}
.mvv-card:hover {
  background: #009688;
  color: #fff;
  transform: translateY(-10px);
  box-shadow: 0 6px 18px rgba(0,150,136,0.4);
}
.mvv-card:hover h4 {
  color: #fff;
}
.why-card {
  background: #009688; /* Logo teal color */
  color: #fff;
  padding: 30px 20px;
  border-radius: 12px;
  height: 100%;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
}
.why-card h5 {
  font-weight: bold;
  margin-bottom: 10px;
}
.why-card p {
  font-size: 14px;
  margin: 0;
}
.why-card:hover {
  background: #00796B; /* Darker teal on hover */
  transform: translateY(-10px);
  box-shadow: 0 6px 18px rgba(0,0,0,0.2);
}
</style>
@endsection
</body>
</html>