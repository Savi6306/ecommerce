<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <link rel="icon" type="image/png" href="/images/PGMS Logo.png">
</head>
<body>
@extends('layout.app')

@section('content')

<div class="privacy-dashboard">
  <h1 class="page-title">Privacy Policy</h1>
  <p class="last-updated">Last Updated: September 2025</p>

  <div class="policy-card">
    <h3>Information We Collect</h3>
    <p>We collect your name, email, phone number, address, and payment details for order processing and customer support.</p>
  </div>

  <div class="policy-card">
    <h3>How We Use Your Information</h3>
    <p>Your information is used to process orders, improve our services, and provide personalized offers.</p>
  </div>

  <div class="policy-card">
    <h3>Sharing of Information</h3>
    <p>We only share data with trusted partners like payment gateways, delivery services, or when required by law.</p>
  </div>

  <div class="policy-card">
    <h3>Your Rights</h3>
    <p>You have the right to access, update, or delete your personal information anytime by contacting us.</p>
  </div>

  <div class="policy-card">
    <h3>Contact Us</h3>
    <p>Email:indiapgms@gmail.com <br> Phone: +91 7060471592</p>
  </div>
  <div class="alert alert-info text-center">
   <a href="{{ route('home') }}" class="text-success fw-bold">Continue shopping!</a>
            </div>
</div>


<style>
.privacy-dashboard {
  max-width: 1000px;
  margin: 40px auto;
  padding: 20px;
  font-family: 'Segoe UI', Tahoma, sans-serif;
}

.page-title {
  text-align: center;
  font-size: 28px;
  font-weight: bold;
  color: #009688; /* Logo color */
  margin-bottom: 5px;
}

.last-updated {
  text-align: center;
  font-size: 14px;
  color: #666;
  margin-bottom: 30px;
}

.policy-card {
  background: #fff;
  border-radius: 12px;
  padding: 20px;
  margin-bottom: 20px;
  border: 1px solid #e0e0e0;
  box-shadow: 0 3px 6px rgba(0,0,0,0.08);
  transition: all 0.3s ease;
}

.policy-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 12px rgba(0,0,0,0.15);
  border-left: 10px solid #009688; /* Highlight border */
}

.policy-card h3 {
  margin-bottom: 10px;
  font-size: 18px;
  font-weight: 600;
  color: #333;
}

.policy-card p {
  font-size: 15px;
  color: #555;
}

</style>
@endsection
</body>
</html>