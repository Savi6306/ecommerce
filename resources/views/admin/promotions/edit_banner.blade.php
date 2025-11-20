@extends('admin.layouts.app')

@section('content')
<h4>Edit Banner</h4>

<form action="{{ route('admin.promotions.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $banner->title }}" required>
    </div>
    <div class="mb-2">
        <label>Current Banner</label>
        @if($banner->banner)
            <img src="{{ asset('storage/'.$banner->banner) }}" width="120">
        @endif
    </div>
    <div class="mb-2">
        <label>Change Banner</label>
        <input type="file" name="banner" class="form-control">
    </div>
    <div class="mb-2">
        <label>Start Date</label>
        <input type="date" name="start_date" class="form-control" value="{{ $banner->start_date }}">
    </div>
    <div class="mb-2">
        <label>End Date</label>
        <input type="date" name="end_date" class="form-control" value="{{ $banner->end_date }}">
    </div>
    <div class="mb-2">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1" {{ $banner->status ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !$banner->status ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
    <button class="btn btn-success">Update Banner</button>
</form>
@endsection
