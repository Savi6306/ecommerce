<!-- Edit Profile Section -->
<div class="card shadow-sm border-0 rounded-3 mt-3">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold">Profile Details</h5>
            <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#editProfileForm">
                <i class="bi bi-pencil-square me-1"></i> Edit Profile
            </button>
        </div>

        <div class="row mb-3">
            <div class="col-md-6"><strong>Name:</strong> {{ Auth::user()->full_name }}</div>
            <div class="col-md-6"><strong>Email:</strong> {{ Auth::user()->email }}</div>
            <div class="col-md-6"><strong>Phone:</strong> {{ Auth::user()->phone ?? 'N/A' }}</div>
            <div class="col-md-6"><strong>Gender:</strong> {{ ucfirst(Auth::user()->gender ?? 'N/A') }}</div>
        </div>

        <div class="collapse mt-3" id="editProfileForm">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', Auth::user()->full_name) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', Auth::user()->phone) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="male" type="radio" name="gender" value="male" {{ old('gender', Auth::user()->gender) == 'male' ? 'checked' : '' }}>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="female" type="radio" name="gender" value="female" {{ old('gender', Auth::user()->gender) == 'female' ? 'checked' : '' }}>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="other" {{ old('gender', Auth::user()->gender) == 'other' ? 'checked' : '' }}>
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
