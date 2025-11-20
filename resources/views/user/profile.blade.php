<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">


@extends('layout.app')

@section('content')
<div class="container my-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body text-center">
                    @php $user = Auth::user(); @endphp
                    @if($user && $user->gender == 'female')
                        <img src="{{ asset('images/female avtar.jpeg') }}" alt="User Avatar" class="rounded-circle mb-2" width="80" height="80">
                    @elseif($user && $user->gender == 'male')
                        <img src="{{ asset('images/male avtar.jpeg') }}" alt="User Avatar" class="rounded-circle mb-2" width="80" height="80">
                    @else
                        <img src="{{ asset('images/default.jpeg') }}" alt="User Avatar" class="rounded-circle mb-2" width="80" height="80">
                    @endif

                    <h6 class="fw-bold">{{ $user->full_name ?? '' }}</h6>
                </div>
                <hr class="my-0">
                <div class="list-group list-group-flush">
                    <a href="{{ url('/profile') }}" class="list-group-item list-group-item-action active">
                        <i class="bi bi-person me-2"></i> My Profile
                    </a>
                    <a href="{{ url('/orders') }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-box-seam me-2"></i> My Orders
                    </a>
                    <a href="{{ url('/wishlist') }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-heart me-2"></i> Wishlist
                    </a>
                    <a href="{{ url('/customer/addresses') }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-geo-alt me-2"></i> Saved Addresses
                    </a>
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="list-group-item list-group-item-action text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">@csrf</form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Welcome, {{ $user->full_name ?? '' }} 👋</h5>
                    <p class="text-muted">Here you can manage your account, orders, wishlist and more.</p>

                    <!-- Edit Profile Section -->
                    <div class="card shadow-sm border-0 rounded-3 mt-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold">Your Profile Details</h5>
                                <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#editProfileForm">
                                    <i class="bi bi-pencil-square me-1"></i> Edit Profile
                                </button>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6"><strong>Name:</strong> {{ $user->full_name }}</div>
                                <div class="col-md-6"><strong>Email:</strong> {{ $user->email }}</div>
                                <div class="col-md-6"><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</div>
                                <div class="col-md-6"><strong>Gender:</strong> {{ ucfirst($user->gender ?? 'N/A') }}</div>
                            </div>

                            <div class="collapse mt-3" id="editProfileForm">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->full_name) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-block">Gender</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="male" {{ old('gender', $user->gender) == 'male' ? 'checked' : '' }}>
                                            <label class="form-check-label">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="female" {{ old('gender', $user->gender) == 'female' ? 'checked' : '' }}>
                                            <label class="form-check-label">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="other" {{ old('gender', $user->gender) == 'other' ? 'checked' : '' }}>
                                            <label class="form-check-label">Other</label>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links Cards -->
                    <div class="row g-3 mt-4">
                        <div class="col-md-4">
                            <div class="card text-center p-3 shadow-sm border-0 rounded-3 bg-light">
                                <i class="bi bi-box-seam fs-1 text-primary mb-2"></i>
                                <h6>My Orders</h6>
                                <p class="small text-muted">Track, return or buy again</p>
                                <a href="{{ url('/orders') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center p-3 shadow-sm border-0 rounded-3 bg-light">
                                <i class="bi bi-heart fs-1 text-danger mb-2"></i>
                                <h6>Wishlist</h6>
                                <p class="small text-muted">Your saved favourites</p>
                                <a href="{{ url('/wishlist') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center p-3 shadow-sm border-0 rounded-3 bg-light">
                                <i class="bi bi-geo-alt fs-1 text-success mb-2"></i>
                                <h6>Addresses</h6>
                                <p class="small text-muted">Manage delivery addresses</p>
                                <a href="{{ url('/customer/addresses') }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
.list-group-item.active {
    background-color: #008080;
    border-color: #0d6efd;
    color: white;
}
</style>

<!-- Bootstrap JS for collapse functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
