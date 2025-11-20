@extends('admin.layouts.app')

@section('title', 'Edit Notification')

@section('content')
<div class="container-fluid">
    <h4>Edit Notification</h4>
    <form action="{{ route('admin.promotions.notifications.update', $notification->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Notification Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $notification->title) }}" required>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $notification->start_date->format('Y-m-d')) }}" required>
            @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $notification->end_date->format('Y-m-d')) }}" required>
            @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="status" value="1" class="form-check-input" {{ $notification->status ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">Update Notification</button>
        <a href="{{ route('admin.promotions.notifications') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
