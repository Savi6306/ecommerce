@extends('layout.app')

@section('content')
<div class="container my-5">

  <!-- Banner -->
  <div class="blog-banner text-center text-white p-5 mb-5" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://via.placeholder.com/1200x300') no-repeat center center/cover; border-radius: 12px;">
    <h1 class="fw-bold">Our Blog</h1>
    <p>Stay updated with the latest news, tips & insights from PGMS</p>
  </div>

  <!-- Blog Cards -->
  <div class="row g-4">

    <!-- Blog 1 -->
    <div class="col-md-6 col-lg-4">
      <div class="card blog-card h-100 p-4" style="background-color: #009688; border-radius:12px; transition: transform 0.3s, box-shadow 0.3s;">
        <h5 class="fw-bold text-white mb-3">Top 10 Ecommerce Trends in 2025</h5>
        <p class="text-white-50">The e-commerce landscape is evolving rapidly. From AI-driven personalization to mobile-first experiences, discover the top 10 trends that will shape online shopping in 2025 and how PGMS is keeping you ahead of the curve.</p>
      </div>
    </div>

    <!-- Blog 2 -->
    <div class="col-md-6 col-lg-4">
      <div class="card blog-card h-100 p-4" style="background-color: #009688; border-radius:12px; transition: transform 0.3s, box-shadow 0.3s;">
        <h5 class="fw-bold text-white mb-3">How PGMS Empowers Vendors</h5>
        <p class="text-white-50">PGMS provides vendors with cutting-edge tools to manage inventory, reach wider audiences, and increase sales. Learn how our platform supports vendors in expanding their business efficiently and profitably.</p>
      </div>
    </div>

    <!-- Blog 3 -->
    <div class="col-md-6 col-lg-4">
      <div class="card blog-card h-100 p-4" style="background-color: #009688; border-radius:12px; transition: transform 0.3s, box-shadow 0.3s;">
        <h5 class="fw-bold text-white mb-3">Why Customers Choose PGMS</h5>
        <p class="text-white-50">With fast delivery, secure payments, and a seamless shopping experience, PGMS is trusted by thousands of customers. Explore the reasons why shoppers prefer our platform over others and how we maintain customer satisfaction.</p>
      </div>
    </div>

    <!-- Blog 4 -->
    <div class="col-md-6 col-lg-4">
      <div class="card blog-card h-100 p-4" style="background-color: #009688; border-radius:12px; transition: transform 0.3s, box-shadow 0.3s;">
        <h5 class="fw-bold text-white mb-3">Effective Marketing Strategies for Online Stores</h5>
        <p class="text-white-50">Marketing is key to e-commerce success. Learn actionable strategies for increasing visibility, engaging customers, and driving sales online. PGMS also offers tools to streamline your marketing campaigns efficiently.</p>
      </div>
    </div>

    <!-- Blog 5 -->
    <div class="col-md-6 col-lg-4">
      <div class="card blog-card h-100 p-4" style="background-color: #009688; border-radius:12px; transition: transform 0.3s, box-shadow 0.3s;">
        <h5 class="fw-bold text-white mb-3">Optimizing Your Supply Chain</h5>
        <p class="text-white-50">A smooth supply chain ensures timely delivery and happy customers. Discover tips on inventory management, logistics optimization, and how PGMS helps vendors deliver faster and smarter.</p>
      </div>
    </div>

    <!-- Blog 6 -->
    <div class="col-md-6 col-lg-4">
      <div class="card blog-card h-100 p-4" style="background-color: #009688; border-radius:12px; transition: transform 0.3s, box-shadow 0.3s;">
        <h5 class="fw-bold text-white mb-3">Future of Online Shopping</h5>
        <p class="text-white-50">The future is digital! Explore emerging technologies, customer trends, and innovative features that will define online shopping in the next decade, and how PGMS is ready for the future.</p>
      </div>
    </div>

  <div class="alert alert-info text-center">
   <a href="{{ route('home') }}" class="text-success fw-bold">Continue shopping!</a>
            </div>

  </div>
</div>

<style>
.blog-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

.blog-banner h1, .blog-banner p {
  text-shadow: 1px 1px 6px rgba(0,0,0,0.6);
}
</style>
@endsection
