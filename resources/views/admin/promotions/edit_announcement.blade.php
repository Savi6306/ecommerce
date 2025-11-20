@extends('admin.layouts.app')

@section('title', 'Edit Announcement')

@section('content')
<div class="container-fluid">
    <h4>Edit Announcement</h4>
    <form action="{{ route('admin.promotions.announcements.update', $announcement->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Announcement Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $announcement->title) }}" required>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $announcement->start_date->format('Y-m-d')) }}" required>
            @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $announcement->end_date->format('Y-m-d')) }}" required>
            @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="status" value="1" class="form-check-input" {{ $announcement->status ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">Update Announcement</button>
        <a href="{{ route('admin.promotions.announcements') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
