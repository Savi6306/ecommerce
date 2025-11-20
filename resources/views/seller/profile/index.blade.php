@extends('seller.layouts.app')

@section('content')
<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2>Seller Profile</h2>
    <div class="card p-3">
       <img src="{{ asset('storage/'.$seller->profile_photo) }}"
     alt="Profile Photo"
     width="120"
     height="120"
     class="rounded-circle object-fit-cover">




        <p><strong>Name:</strong> {{ $seller->name }}</p>
        <p><strong>Store Name:</strong> {{ $seller->store_name ?? '-' }}</p>
        <p><strong>Email:</strong> {{ $seller->email }}</p>
        <p><strong>Phone:</strong> {{ $seller->phone ?? '-' }}</p>
        <p><strong>Address:</strong> {{ $seller->address ?? '-' }}</p>

        <a href="{{ route('seller.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        <br>
        <a href="{{ route('seller.changePassword') }}" class="btn btn-secondary">Change Password</a>
    </div>
</div>
@endsection
