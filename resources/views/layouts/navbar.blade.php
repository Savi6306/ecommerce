<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Example</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Remove top gap */
    body {
      margin: 0 !important;
      padding: 0 !important;
    }

    /* Fix navbar spacing */
    .navbar {
      margin-top: 0 !important;
      padding-top: 0.25rem !important;
      top: 0;
    }

    /* Button styling */
    .btn-teal-outline {
      border: 2px solid #009688;
      color: #009688;
      background-color: transparent;
      transition: 0.3s;
    }

    .btn-teal-outline:hover {
      background-color: #009688;
      color: #fff;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg shadow-sm bg-white fixed-top">
    <div class="container-fluid px-4">
      <a class="navbar-brand d-flex align-items-center" href="{{ route('seller.index') }}">
        <img src="{{ asset('images/logo.png') }}" alt="PGMS Logo" height="50" class="me-2">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
          <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="{{ route('seller.index') }}">Sell Online</a></li>
          <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="{{ route('seller.howToWork') }}">How it works</a></li>
          <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="{{ route('seller.pricingCommission') }}">Pricing & Commission</a></li>
          <li class="nav-item"><a class="nav-link fw-semibold text-dark" href="{{ route('seller.shippingReturns') }}">Shipping & Returns</a></li>
          <li class="nav-item"><a class="btn btn-teal-outline fw-semibold px-3 rounded-pill" href="{{ route('seller.login') }}">Login</a></li>
          <li class="nav-item"><a class="btn btn-teal-outline fw-semibold px-3 rounded-pill" href="{{ route('seller.startSelling') }}">Start Selling</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
