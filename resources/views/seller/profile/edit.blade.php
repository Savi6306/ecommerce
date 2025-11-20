@extends('seller.layouts.app')

@section('content')
<div class="container py-4">
    <h2>Edit Profile</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-3 shadow-sm">
        <form action="{{ route('seller.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name', $seller->name) }}" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Store Name</label>
                    <input type="text" name="store_name" value="{{ old('store_name', $seller->store_name) }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $seller->phone) }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" value="{{ old('address', $seller->address) }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Profile Photo</label>
                    <input type="file" name="profile_photo" class="form-control" id="profilePhotoInput" accept="image/*">

                    {{-- ✅ Show current image if exists --}}
                    @if($seller->profile_photo)
                        <div class="mt-2">
                            <p>Current Photo:</p>
                           <img src="{{ asset('storage/'.$seller->profile_photo) }}"
     alt="Profile Photo"
     width="120"
     height="120"
     class="rounded-circle object-fit-cover">

                        </div>
                    @endif

                    {{-- ✅ Live Preview for new photo --}}
                    <img id="previewImage" src="#" alt="Preview" class="mt-2 rounded-circle" style="max-width: 100px; display:none;">
                </div>
            </div>

            <button class="btn btn-success mt-3">Update Profile</button>
        </form>
    </div>
</div>

{{-- ✅ JS for image preview --}}
<script>
document.getElementById('profilePhotoInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            const preview = document.getElementById('previewImage');
            preview.src = event.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
