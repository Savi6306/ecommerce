<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Address</title>
     <link rel="icon" type="image/png" href="/images/PGMS Logo.png">
</head>
<body>

@extends('layout.app')

@section('content')
<div class="container">
    <h2>Add Address</h2>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Pincode</label>
            <input type="text" name="pincode" class="form-control" required>
        </div>

        <div class="form-group">
            <label>State</label>
            <input type="text" name="state" class="form-control" required>
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" name="city" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Address Line 1</label>
            <input type="text" name="address_line1" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Address Line 2</label>
            <input type="text" name="address_line2" class="form-control">
        </div>

        <div class="form-check">
            <input type="checkbox" name="is_default" class="form-check-input">
            <label class="form-check-label">Set as default</label>
        </div>

        <button type="submit" class="btn btn-success">Save Address</button>
    </form>
</div>
<style>
    .btn-teal {
        background-color: #008080;
        color: white;
    }
    .btn-teal:hover {
        background-color: #006666;
    }
</style>
@endsection

</body>
</html>