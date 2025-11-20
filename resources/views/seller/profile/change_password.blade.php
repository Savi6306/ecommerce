@extends('seller.layouts.app')

@section('content')
<div class="container py-4">
    <h2>Change Password</h2>
    <div class="card p-3">

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('seller.profile.updatePassword') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Current Password</label>
                <input type="password" name="current_password" class="form-control">
            </div>

            <div class="mb-3">
                <label>New Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <button class="btn btn-success">Update Password</button>
        </form>
    </div>
</div>
@endsection
