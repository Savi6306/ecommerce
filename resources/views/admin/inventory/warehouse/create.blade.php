@extends('admin.layouts.app')

@section('title', 'Add Warehouse')

@section('content')
<div class="container mt-4">
    <h3>➕ Add Warehouse</h3>

    <form method="POST" action="{{ route('admin.inventory.warehouse.store') }}">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control">
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
