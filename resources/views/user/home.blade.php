<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PGMS-Pushpendra Global Mart Solutions Online Shopping</title>
     <link rel="icon" type="image/png" href="/images/PGMS Logo.png">
    <link rel="stylesheet" href="">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2">
    <div class="container-fluid">

{{-- Left: Logo --}}
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">
            <img src="{{ asset('images/PGMS Logo.png') }}" alt="PGMS" width="120">
        </a>

{{-- Center: Search Bar --}}
        <form class="d-flex mx-auto w-50">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search"></i> {{-- Bootstrap Icon --}}
                </span>
                <input class="form-control border-start-0" type="search"
                       placeholder="Search dresses, shoes, accessories..." aria-label="Search">
            </div>
        </form>

 {{-- Right: Links + Icons --}}
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item">
  <a class="nav-link fw-bold" href="{{ route('seller.index') }}">
    Beacome a seller
  </a>
</li>

{{-- Wishlist --}}
<li class="nav-item">
  <a class="nav-link fw-bold" href="{{ url('/wishlist') }}">
    <i class="bi bi-heart"></i> Wishlist
  </a>
</li>

{{-- Profile (Hover Dropdown) --}}
<li class="nav-item dropdown">
@auth('customer')
    @php $c = Auth::guard('customer')->user(); @endphp

    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{-- Avatar based on gender --}}
        @if($c->gender === 'female')
            <img src="{{ asset('images/female avtar.jpeg') }}" class="rounded-circle me-2" width="28" height="28" alt="Avatar">
        @elseif($c->gender === 'male')
            <img src="{{ asset('images/male avtar.jpeg') }}" class="rounded-circle me-2" width="28" height="28" alt="Avatar">
        @else
            <img src="{{ asset('images/default.jpeg') }}" class="rounded-circle me-2" width="28" height="28" alt="Avatar">
        @endif

        <span class="fw-semibold">{{ $c->full_name }}</span>
    </a>

    <ul class="dropdown-menu shadow-sm border-0 rounded-3 mt-2">
        <li><h6 class="dropdown-header">Welcome, {{ $c->full_name }} 👋</h6></li>
        <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="bi bi-person me-2 text-primary"></i> My Profile</a></li>
        <li><a class="dropdown-item" href="{{ route('orders') }}"><i class="bi bi-box-seam me-2 text-success"></i> My Orders</a></li>
        <li><a class="dropdown-item" href="{{ route('wishlist') }}"><i class="bi bi-heart me-2 text-danger"></i> Wishlist</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <form action="{{ route('customer.logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </li>
    </ul>
    @else
        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
            <!-- Default Avatar -->
            <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png"
                 alt="Guest"
                 class="rounded-circle me-2"
                 width="28" height="28">
            <span class="fw-semibold">Login</span>
        </a>
        <ul class="dropdown-menu shadow-sm border-0 rounded-3 mt-2">
            <li><a class="dropdown-item" href="{{ route('signup') }}"><i class="bi bi-person-plus me-2 text-success"></i> Sign Up</a></li>
            <li><a class="dropdown-item" href="/user/login"><i class="bi bi-box-arrow-in-right me-2 text-primary"></i> Login</a></li>
        </ul>
    @endauth
</li>

{{-- Cart --}}
<li class="nav-item">
  <a class="nav-link fw-bold" href="{{ url('/cart') }}">
    <i class="bi bi-cart"></i> Cart
  </a>
</li>
        </ul>
    </div>
</nav>
{{-- Second Navbar --}}
<nav class="navbar navbar-expand-lg" style="background-color: #00796b;">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#categoryNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="categoryNav">
      <ul class="navbar-nav mx-auto">

  <!-- Women's Wear -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold text-white" href="#" id="womenDropdown" role="button" data-bs-toggle="dropdown">
            Women's Fashion</a>
          <ul class="dropdown-menu" aria-labelledby="womenDropdown">
            <li><a class="dropdown-item" href="/womens-tops">Western Wear</a></li>
            <li><a class="dropdown-item" href="/womens-dresses">Ethnic Wear</a></li>
            <li><a class="dropdown-item" href="/womens-accessories">Accessories</a></li>
          </ul>
        </li>

  <!-- Men's Wear -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold text-white" href="#" id="menDropdown" role="button" data-bs-toggle="dropdown">
            Men's Fashion </a>
          <ul class="dropdown-menu" aria-labelledby="menDropdown">
            <li><a class="dropdown-item" href="/mens-shirts">Western Wear</a></li>
            <li><a class="dropdown-item" href="/mens-pants">Ethnic Wear</a></li>
          </ul>
        </li>

  <!-- Kids -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold text-white" href="#" id="kidsDropdown" role="button" data-bs-toggle="dropdown">
            Kids</a>
          <ul class="dropdown-menu" aria-labelledby="kidsDropdown">
            <li><a class="dropdown-item" href="/kids-boys">Boys</a></li>
            <li><a class="dropdown-item" href="/kids-girls">Girls</a></li>
            <li><a class="dropdown-item" href="/kids-toys">Toys</a></li>
          </ul>
        </li>

  <!-- Home & Kitchen -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold text-white" href="#" id="homeDropdown" role="button" data-bs-toggle="dropdown">
            Home & Kitchen</a>
          <ul class="dropdown-menu" aria-labelledby="homeDropdown">
            <li><a class="dropdown-item" href="/home-decor">Home Decor</a></li>
            <li><a class="dropdown-item" href="/furniture">Furniture</a></li>
          </ul>
        </li>

   <!-- Beauty & Health -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold text-white" href="#" id="beautyDropdown" role="button" data-bs-toggle="dropdown">
            Beauty & Health</a>
          <ul class="dropdown-menu" aria-labelledby="beautyDropdown">
            <li><a class="dropdown-item" href="/skincare">Skincare</a></li>
            <li><a class="dropdown-item" href="/haircare">Haircare</a></li>
            <li><a class="dropdown-item" href="/health-supplements">Supplements</a></li>
          </ul>
        </li>

  <!-- Bags & Footwear -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold text-white" href="#" id="bagsDropdown" role="button" data-bs-toggle="dropdown">
            Bags & Footwear</a>
          <ul class="dropdown-menu" aria-labelledby="bagsDropdown">
            <li><a class="dropdown-item" href="/bags">Bags</a></li>
            <li><a class="dropdown-item" href="/shoes">Shoes</a></li>
            <li><a class="dropdown-item" href="/accessories">Flats</a></li>
          </ul>
        </li>

  <!-- Grocery -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-bold text-white" href="#" id="groceryDropdown" role="button" data-bs-toggle="dropdown">
            Grocery</a>
          <ul class="dropdown-menu" aria-labelledby="groceryDropdown">
            <li><a class="dropdown-item" href="/fruits">Fruits & Vegetables</a></li>
            <li><a class="dropdown-item" href="/snacks">Snacks</a></li>
            <li><a class="dropdown-item" href="/beverages">Beverages</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


{{-- Banner Slider --}}
<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
  
  {{-- Slides --}}
  <div class="carousel-inner">
    {{-- Banner 1 --}}
    <div class="carousel-item active">
      <img src="{{ asset('images/banner4.png') }}" class="d-block w-100" alt="Banner 1">

  {{-- Button --}}
     <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
    <a href="{{ url('/shop') }}" class="btn btn-custom px-4 py-2">Shop Now</a>
</div>

    </div>
</div>


{{--Category--}}

<div class="container my-5">
  <div class="row text-center g-4">

<!-- Womens Wear -->
    <div class="col-6 col-md-2">
      <a href="{{ url('/category/ethnic-wear') }}" class="category-card">
        <img src="{{ asset('images/women wear1.jpg') }}" alt="Womens Wear">
        <p>Womenwear</p>
      </a>
    </div>

<!-- Mens Wear -->
    <div class="col-6 col-md-2">
      <a href="{{ url('/category/western-dresses') }}" class="category-card">
        <img src="{{ asset('images/Mens_Wear.webp') }}" alt="Menswear">
        <p>Menswear</p>
      </a>
    </div>

<!-- Footwear -->
    <div class="col-6 col-md-2">
      <a href="{{ url('/category/menswear') }}" class="category-card">
        <img src="{{ asset('images/footwear1.jpg') }}" alt="Footwear">
        <p>Footwear</p>
      </a>
    </div>

<!-- Beauty -->
    <div class="col-6 col-md-2">
      <a href="{{ url('/category/footwear') }}" class="category-card">
        <img src="{{ asset('images/beauty.jpg') }}" alt="Beauty">
        <p>Beauty</p>
      </a>
    </div>

<!-- Jewellery -->
    <div class="col-6 col-md-2">
      <a href="{{ url('/category/home-decor') }}" class="category-card">
        <img src="{{ asset('images/jwellery.webp') }}" alt="Jewellery">
        <p>Jewellery</p>
      </a>
    </div>

<!-- Grocery-->
    <div class="col-6 col-md-2">
      <a href="{{ url('/category/beauty') }}" class="category-card">
        <img src="{{ asset('images/grocery1.png') }}" alt="Grocery">
        <p>Grocery</p>
      </a>
    </div>
  </div>
</div>

<div class="container my-5">

<!-- 🔍 Filter Section -->
<div class="container my-5 p-4 bg-white rounded-3 shadow-sm">
  <h3 class="fw-bold mb-3 text-center" style="color:#009688;">🛒 Filter Your Products</h3>
  <div class="row g-3 align-items-end">

    <!-- Category -->
    <div class="col-md-4">
      <label for="filterCategory" class="form-label fw-semibold" style="color:#009688;">Category</label>
      <select id="filterCategory" class="form-select border-secondary">
        <option value="">All Categories</option>
        @foreach(\App\Models\User\Category::all() as $cat)
          <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
      </select>
    </div>

    <!-- Price -->
    <div class="col-md-4">
      <label for="filterPrice" class="form-label fw-semibold" style="color:#009688;">Price</label>
      <select id="filterPrice" class="form-select border-secondary">
        <option value="">All Prices</option>
        <option value="0-500">₹0 - ₹500</option>
        <option value="500-2000">₹500 - ₹2000</option>
        <option value="2000-5000">₹2000 - ₹5000</option>
        <option value="5000">₹5000+</option>
      </select>
    </div>

    <!-- Size -->
    <div class="col-md-4">
      <label for="filterSize" class="form-label fw-semibold" style="color:#009688;">Size</label>
      <select id="filterSize" class="form-select border-secondary">
        <option value="">All Sizes</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
      </select>
    </div>

    <!-- Apply Button -->
    <div class="col-12 mt-3 text-center">
      <button class="btn" style="background-color:#009688; color:white; font-weight:bold; border-radius:30px; padding:10px 25px;" onclick="applyFilters()">
        Apply Filters <i class="bi bi-funnel-fill ms-2"></i>
      </button>
    </div>

  </div>
</div>

  @php
    use Illuminate\Support\Str;
    use App\Models\Seller\Product;
@endphp

<section class="mb-5">
    <div class="container my-5">
        <h2 class="text-center mb-4 fw-bold text-success">Featured Products 🛍️</h2>
        <div class="row" id="productContainer">
            
            @foreach(Product::where('is_featured', 1)->take(8)->get() as $product)
                @php
                    // ✅ Determine correct image path
                    $imagePath = $product->image
                        ? (Str::contains($product->image, 'storage/')
                            ? asset($product->image)
                            : asset('storage/' . ltrim($product->image, '/')))
                        : asset('images/default-product.png');

                    // ✅ Wishlist status check
                    $isWishlisted = \App\Models\User\Wishlist::where('user_id', auth()->id())
                        ->where('product_id', $product->id)
                        ->exists();
                @endphp

                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm product-card">
                        {{-- ✅ Product Image --}}
                        <img src="{{ $imagePath }}" 
                             alt="{{ $product->name }}" 
                             class="card-img-top rounded border"
                             width="350" height="300" 
                             style="object-fit: cover;">

                        {{-- ✅ Product Details --}}
                        <div class="card-body text-center">
                            <h5 class="fw-bold">{{ $product->name }}</h5>
                            <p class="text-muted">{{ Str::limit($product->description, 80) }}</p>
                            <h6 class="text-success fw-bold mb-3">₹{{ $product->price }}</h6>

                            {{-- 🛒 Add to Cart --}}
                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-sm btn-primary mb-2">Add to Cart</a>

                            {{-- 🛍️ Buy Now --}}
                            @auth
                                <a href="{{ url('/buy-now/'.$product->id) }}" class="btn btn-success btn-sm mb-2">Buy Now</a>
                            @else
                                <a href="/user/login" class="btn btn-success btn-sm mb-2"
                                   onclick="return confirm('Please login to continue with Buy Now');">
                                   Buy Now
                                </a>
                            @endauth

                            {{-- ❤️ Wishlist --}}
                            <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" 
                                        class="btn btn-outline-danger btn-sm mt-2">
                                    {{ $isWishlisted ? 'Wishlisted ❤️' : 'Add to Wishlist ❤️' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>



    <!-- Popular Products -->
    <section class="mb-5">
        <h2 class="text-center mb-4 fw-bold text-warning">Popular Products⭐</h2>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Popular Item</h5>
                        <p class="card-text text-muted">₹0.00</p>
                        <a href="#" class="btn btn-custom">Add to Cart</a><br>
                        <br>
                        <a href="#" class="btn btn-custom">Buy Now</a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Products -->
    <section>
        <h2 class="text-center mb-4 fw-bold text-success">🆕 Latest Products</h2>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">New Arrival</h5>
                        <p class="card-text text-muted">₹0.00</p>
                        <a href="#" class="btn btn-custom">Add to Cart</a><br>
                        <br>
                        <a href="#" class="btn btn-custom">Buy Now</a>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

{{--Footer--}}
<footer class="footer text-white pt-5 pb-3">
  <div class="container">
    <div class="row">

      <!-- Company Info -->
      <div class="col-md-3 mb-4">
        <h5>Company</h5>
        <ul class="list-unstyled">
          <li><a href="{{ url('/about') }}">About Us</a></li>
          <li><a href="{{ url('/contact') }}">Contact Us</a></li>
          <li><a href="{{ url('/blog') }}">Blog</a></li>
          <li><a href="{{ url('/terms') }}">Terms & Conditions</a></li>

        </ul>
      </div>

      <!-- Customer Service -->
      <div class="col-md-3 mb-4">
        <h5>Customer Service</h5>
        <ul class="list-unstyled">
          <li><a href="{{ url('/FAQ') }}">Help & FAQ</a></li>
          <li><a href="{{ url('/returns') }}">Returns</a></li>
          <li><a href="{{ url('/shipping_info') }}">Shipping Info</a></li>
          <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
        </ul>
      </div>

      <!-- Quick Links -->
      <div class="col-md-3 mb-4">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="{{ url('/') }}">All Categories</a></li>
          <li><a href="{{ url('/offers') }}">Offers</a></li>
          <li><a href="{{ url('/bestsellers') }}">Best Sellers</a></li>
        </ul>
      </div>

      <!-- Follow Us -->
<div class="col-md-3 mb-4 text-center">
  <h5>Follow Us</h5>
  <div class="social-icons mt-3 d-flex justify-content-center gap-3">
    <a href="https://www.facebook.com/profile.php?id=61575139485184" onclick="window.open('https://facebook.com','_blank')">
      <i class="fab fa-facebook-f"></i>
    </a>
    <a href="https://www.instagram.com/indiapgms?utm_source=qr&igsh=d2dyM3llcG43YXdx" onclick="window.open('https://instagram.com/yourusername','_blank')">
      <i class="fab fa-instagram"></i>
    </a>

    <a href="vnd.youtube://channel/yourchannelid" onclick="window.open('https://youtube.com/@yourchannelid','_blank')">
      <i class="fab fa-youtube"></i>
    </a>
    <a href="https://www.linkedin.com/company/106752355/admin/dashboard/" onclick="window.open('https://linkedin.com/in/yourprofile','_blank')">
      <i class="fab fa-linkedin-in"></i>
    </a>
  </div>
</div>

    </div>

    <hr class="bg-light">

    <div class="text-center">
      <p class="mb-0">&copy; 2025 PGMS. All Rights Reserved.</p>
    </div>
  </div>
</footer>

{{-- Custom CSS for height --}}
<style>
.carousel-item img {
    height: 400px;       /* Change as needed */
    object-fit: cover;   /* Crops without distortion */
}
.carousel-caption {
    bottom: 20%; /* text ko upar niche move karne ke liye */
}

.carousel-caption {
    bottom: 40%; /* upar-niche adjust karne ke liye */
}

.carousel-caption .btn {
    font-size: 1.2rem;
    border-radius: 30px;
    color:white;
}
.btn-custom {
    background-color:#006666; /* Teal color */
    color:white;              /* White text */
    border-radius: 30px;
    font-size: 1.2rem;
    font-weight: bold;
    transition: 0.3s ease;
}

.btn-custom {
    background-color: #008080; /* nav2 teal */
    color: #fff;
    font-weight: bold;
    border-radius: 5px;
    transition: 0.3s;
}

.btn-custom:hover {
    background-color: #111616ff; /* darker teal on hover */
    color: #fcf2f2ff;
}
.nav-item.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;
}

.navbar-nav .nav-link:hover {
  color: #ffcc00; /* your desired hover color */
}
.dropdown-menu .dropdown-item:hover {
  background-color: #008080; /* optional for dropdown items */
}
.features-section {
  width: 100%;           /* Full width screen */
  background: #fff;      /* White background */
  margin-top: -15px;      /* 👈 ye banner ke niche ka white gap hata dega */
}

.feature-icon {
  font-size: 1.6rem;
  color: #009688; /* 👈 "Shop Now" button ka color daalo yahan */
}
.category-card {
  display: block;
  text-decoration: none;
  color: #fdf8f8ff;
  border: 1px solid #eee;
  border-radius: 10px;
  padding: 15px;
  transition: all 0.3s ease-in-out;
  background:#019688;
}

.category-card img {
  width: 100%;
  height: 180px; /* thoda bada */
  object-fit: contain; /* pura image dikhe */
  margin-bottom: 10px;
}

.category-card p {
  font-weight: 500;
  margin: 0;
}

.category-card:hover {
  transform: translateY(-5px);
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
}
.footer {
  background-color: #009688; /* Apne logo ka color */
}

.footer h5 {
  font-weight: 600;
  margin-bottom: 15px;
}

.footer a {
  color: #fff;
  text-decoration: none;
  display: block;
  margin-bottom: 8px;
  transition: color 0.3s;
}

.footer a:hover {
  color: #2a045cff; /* Golden hover */
}

 .footer .social-icons a {
    display: inline-block;
    font-size: 22px;
    color: #fff;
    background: #008080; /* Logo ka color */
    width: 40px;
    height: 40px;
    border-radius: 50%;
    line-height: 40px;
    text-align: center;
    transition: 0.3s;
  }
  .footer .social-icons a:hover {
    background: #006666;
    color: #1411d3ff;
  }

.product-card {
        border-radius: 12px;
        transition: 0.3s ease-in-out;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .btn-custom {
        background-color: #009688; /* Logo ka color */
        color: #fff;
        font-weight: 600;
        border-radius: 8px;
        padding: 8px 15px;
        transition: 0.3s;
    }
    .btn-custom:hover {
        background-color: #00796B;
    }

    .nav-item .dropdown-toggle {
    cursor: pointer;
    transition: 0.3s;
}

.nav-item .dropdown-toggle:hover {
    color: #008080; /* Logo color */
}

.dropdown-menu {
    min-width: 220px;
    font-size: 14px;
}

.dropdown-item {
    padding: 8px 15px;
    border-radius: 6px;
    transition: 0.2s;
}

.dropdown-item:hover {
    background-color: #f2f2f2;
}
.text-teal { color: #009688; }

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,150,136,0.3); /* logo color shadow */
}

.btn:hover {
    background-color: #00796B !important; /* darker logo color on hover */
    color: white !important;
}

.wishlist-icon {
  position: absolute;
  top: 12px;
  right: 12px;
  background: #fff;
  border-radius: 50%;
  width: 34px;
  height: 34px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  color: #bbb;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
  text-decoration: none;
  transition: all 0.3s ease;
  z-index: 10;
}
.wishlist-icon:hover {
  color: #ff4b5c;
  transform: scale(1.1);
}
.wishlist-icon.active {
  color: #ff4b5c;
}

/* 📱 Mobile View Fix — Icons Left Side */
@media (max-width: 992px) {
  /* Navbar container full width */
  .navbar .container-fluid {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  /* Logo left aligned as usual */
  .navbar-brand {
    margin-right: auto;
  }

  /* Icons row — move to left side just after logo */
  .navbar-nav {
    order: 2; /* icons after logo */
    flex-direction: row !important;
    justify-content: flex-start !important;
    align-items: center;
    gap: 15px;
    margin-left: 15px;
  }

  .navbar-nav .nav-link {
    font-size: 0;
  }

  .navbar-nav .nav-link i {
    font-size: 22px;
    color: #008080;
  }

  .navbar-nav .nav-link img {
    width: 26px;
    height: 26px;
  }

  .navbar-nav .nav-link span {
    display: none;
  }

  form.d-flex {
    width: 100% !important;
    order: 3;
    margin-top: 10px;
  }

  .input-group input {
    font-size: 14px;
  }

}


</style>

<script>
function applyFilters() {
    const category = document.getElementById('filterCategory').value;
    const price = document.getElementById('filterPrice').value;
    const size = document.getElementById('filterSize').value;

    // Build query string
    let query = [];
    if(category) query.push(`category=${category}`);
    if(price) query.push(`price=${price}`);
    if(size) query.push(`size=${size}`);
    const queryString = query.length ? '?' + query.join('&') : '';

    // Fetch filtered products from backend
    fetch(`/filter-products${queryString}`)
        .then(res => res.text())
        .then(html => {
            document.getElementById('productContainer').innerHTML = html;
        })
        .catch(err => console.error(err));
}
</script>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>