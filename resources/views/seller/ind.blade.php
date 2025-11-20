@extends('seller.layouts.app')

@section('content')
<div class="container py-5">
    <h1>Seller Dashboard</h1>
    <p>Welcome, {{ auth()->guard('seller')->user()->name ?? 'Seller' }}!</p>

    <form method="POST" action="{{ route('seller.logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection
