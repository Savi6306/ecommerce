@extends('admin.layouts.app')

@section('title', 'Add Announcement')

@section('content')
<div class="container-fluid">
    <h4>Add Announcement</h4>
    <form action="{{ route('admin.promotions.announcements.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Announcement Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
            @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
            @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="status" value="1" class="form-check-input" checked>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">Save Announcement</button>
        <a href="{{ route('admin.promotions.announcements') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
