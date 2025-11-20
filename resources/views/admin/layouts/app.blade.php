<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            width: 270px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #212529;
            color: #fff;
            overflow-y: auto;
            padding-bottom: 100px;
        }

        .sidebar h4 {
            text-align: center;
            font-weight: bold;
            color: #ffc107;
            padding: 15px 0;
        }

        .sidebar a {
            display: block;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-left: 3px solid transparent;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #343a40;
            border-left: 3px solid #ffc107;
        }

        .menu-title {
            font-size: 0.9rem;
            text-transform: uppercase;
            opacity: 0.7;
            padding: 10px 20px 5px;
        }

        /* Top Navbar */
        .top-navbar {
            margin-left: 270px;
            padding: 10px 30px;
            border-bottom: 1px solid #ddd;
            background-color: #fff;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: fixed;
            width: calc(100% - 270px);
            z-index: 1000;
        }

        /* Main Content */
        .main-content {
            margin-left: 270px;
            padding: 100px 30px 30px 30px; /* top padding for navbar */
        }
    </style>
    @stack('styles')
</head>
<body>

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')
 
    {{-- Top Navbar --}}
    <div class="top-navbar">
        
        {{-- Admin Profile + Logout --}}
        <div class="d-flex align-items-center">
            <span class="me-2">👤 {{ auth('admin')->user()->name ?? 'Admin' }}</span>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
