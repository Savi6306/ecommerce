<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PGMS')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/PGMS Logo.png') }}">

    {{-- ✅ Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- ✅ Font Awesome (Fixed) --}}
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    {{-- Optional: Bootstrap Icons --}}
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
</head>
<body>

    {{-- Navbar --}}
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
                        <i class="bi bi-search"></i>
                    </span>
                    <input class="form-control border-start-0" type="search"
                        placeholder="Search dresses, shoes, accessories..." aria-label="Search">
                </div>
            </form>

            {{-- Right: Nav Links --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                {{-- Add your menu items here --}}
            </ul>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- ✅ Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
