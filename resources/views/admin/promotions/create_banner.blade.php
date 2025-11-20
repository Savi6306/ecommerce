@extends('admin.layouts.app')

@section('content')
<h4>Add Banner</h4>

<form action="{{ route('admin.promotions.banners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-2">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Banner Image</label>
        <input type="file" name="banner" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Start Date</label>
        <input type="date" name="start_date" class="form-control">
    </div>
    <div class="mb-2">
        <label>End Date</label>
        <input type="date" name="end_date" class="form-control">
    </div>
    <div class="mb-2">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>
    <button class="btn btn-success">Save Banner</button>
</form>
@endsection
