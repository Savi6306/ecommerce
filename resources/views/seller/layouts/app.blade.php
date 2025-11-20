<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Seller Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body { background-color: #f5f6fa; }

        /* Sidebar */
        .sidebar {
            width: 230px;
            min-height: 100vh;
            background-color: #1e272e;
            display: flex;
            flex-direction: column;
        }
        .sidebar h4 { color:#fff; text-align:center; }
        .sidebar .nav-link { color:#fff; padding:10px 15px; display:flex; align-items:center; border-radius:6px; transition: background 0.3s; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background-color:#2d3436; }
        .sidebar .nav-link i { margin-right:8px; }

        /* Topbar */
        .topbar { height:60px; background:#fff; border-bottom:1px solid #ddd; display:flex; align-items:center; justify-content:space-between; padding:0 20px; }
        .nav-item.mt-auto { margin-top:auto; }

        /* Content */
        .content-wrapper { flex-grow:1; display:flex; flex-direction:column; }
    </style>

    @stack('styles')
</head>
<body>
<div class="d-flex">

    <!-- Sidebar -->
    <nav class="sidebar p-3">
        <h4 class="mb-4">Seller Panel</h4>
        <ul class="nav flex-column">

            @auth('seller')
            <li class="nav-item">
                <a href="{{ route('seller.dashboard') }}" class="nav-link {{ request()->routeIs('seller.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('seller.analytics') }}" class="nav-link {{ request()->routeIs('seller.analytics') ? 'active' : '' }}">
                    <i class="bi bi-graph-up"></i> Analytics
    </a>
   </li>
 <!-- Chat Management -->
<li class="nav-item mt-3">
    <div class="menu-title text-uppercase text-white small px-3">Chat Management</div>

    <a href="#" class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" onclick="toggleSubmenu(event, 'sellerChatMenu')">
        💬 Chat System <i class="bi bi-chevron-down"></i>
    </a>

    <div class="submenu ms-3" id="sellerChatMenu" style="display: none;">
        <a href="{{ route('seller.chats.admin') }}" class="nav-link">
            Chat with Admins
        </a>
        <a href="{{ route('seller.chats.users') }}" class="nav-link">
            Chat with Users
        </a>
    </div>
</li>

         
            
            <!-- Products Menu -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#productsMenu" role="button" aria-expanded="false">
                    <i class="bi bi-box-seam"></i> Products
                </a>
                <div class="collapse" id="productsMenu">
                    <ul class="nav flex-column ms-3">
                        <li><a href="{{ route('seller.products.index')}}" class="nav-link">All Products</a></li>
                        <li><a href="{{ route('seller.products.create')}}" class="nav-link">Add Product</a></li>
                        <li><a href="{{ route('seller.products.outOfStock')}}" class="nav-link">Out of Stock</a></li>
                        <li><a href="{{ route('seller.products.featured')}}" class="nav-link">Featured</a></li>
                    </ul>
                </div>
            </li>

            <!-- Orders Menu -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ordersMenu" role="button" aria-expanded="false">
                    <i class="bi bi-bag"></i> Orders
                </a>
                <div class="collapse" id="ordersMenu">
                    <ul class="nav flex-column ms-3">
                        <li><a href="{{ route('seller.orders.index') }}" class="nav-link">All Orders</a></li>
                        <li><a href="{{ route('seller.orders.pending') }}" class="nav-link">Pending</a></li>
                        <li><a href="{{ route('seller.orders.inTransit') }}" class="nav-link">In Transit</a></li>
                        <li><a href="{{ route('seller.orders.approved') }}" class="nav-link">Approved</a></li>
                    </ul>
                </div>
            </li>

            <!-- Settings -->
            <li class="nav-item mt-3 border-top pt-2">
                <a href="{{ route('seller.settings') }}" class="nav-link {{ request()->routeIs('seller.settings') ? 'active' : '' }}">
                    <i class="bi bi-gear me-2"></i> Settings
                </a>
            </li>
            @endauth

            @guest('seller')
            <li class="nav-item">
                <a href="{{ route('seller.login') }}" class="nav-link">Login</a>
            </li>
            @endguest
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="content-wrapper">

        <!-- Topbar -->
        <div class="topbar">
            <h5 class="mb-0">@yield('title','Dashboard')</h5>

            <div class="d-flex align-items-center gap-3">
                <!-- Search Form -->
                <form action="{{ route('seller.products.index') }}" method="GET" class="position-relative" style="width: 250px;">
                    <input type="text" name="search" class="form-control rounded-pill ps-4" placeholder="Search..." value="{{ request('search') }}">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                </form>

                <!-- Profile Dropdown -->
                @auth('seller')
                <div class="dropdown">
                    <button class="btn btn-light d-flex align-items-center" id="profileDropdown" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle fs-4 me-2"></i>
                        <span>{{ Auth::guard('seller')->user()->name }}</span>
                        <i class="bi bi-caret-down-fill ms-2"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{ route('seller.profile') }}">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('seller.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth
            </div>
        </div>

        <!-- Content Section -->
        <div class="p-4">
            @yield('content')
        </div>

    </div>
</div>
<script>
function toggleSubmenu(e, id) {
    e.preventDefault();
    const submenu = document.getElementById(id);
    submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
