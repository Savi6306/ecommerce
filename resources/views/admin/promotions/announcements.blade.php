@extends('admin.layouts.app')

@section('title', 'Announcements')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Announcements</h4>
        <a href="{{ route('admin.promotions.announcements.create') }}" class="btn btn-primary">+ Add Announcement</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($announcements as $announcement)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->start_date }}</td>
                    <td>{{ $announcement->end_date }}</td>
                    <td>{{ $announcement->status ? 'Active' : 'Inactive' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No announcements found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $announcements->links() }}
</div>
@endsection
