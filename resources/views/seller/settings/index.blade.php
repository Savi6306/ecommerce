@extends('seller.layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-3"><i class="bi bi-gear me-2"></i> Account Settings</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('seller.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 text-center">
                @if($seller->profile_photo)
                  <img src="{{ asset('storage/'.$seller->profile_photo) }}"
     alt="Profile Photo"
     width="120"
     height="120"
     class="rounded-circle object-fit-cover">

                @else
                    <img src="https://via.placeholder.com/120" class="rounded-circle mb-3" alt="Default">
                @endif
                <div>
                    <input type="file" name="profile_photo" class="form-control w-50 mx-auto">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Store Name</label>
                    <input type="text" name="store_name" class="form-control" 
                           value="{{ old('store_name', $seller->store_name) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" 
                           value="{{ old('phone', $seller->phone) }}">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="2">{{ old('address', $seller->address) }}</textarea>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-save me-1"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
