@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">🧑‍💼 Your Profile</h2>

    @if($user)
        <div class="card shadow-sm p-4">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Joined On:</strong> {{ $user->created_at->format('d M Y') }}</p>

            <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>
        </div>
    @else
        <div class="alert alert-warning">
            You are not logged in. Please <a href="{{ route('login') }}">login</a>.
        </div>
    @endif
</div>
@endsection
