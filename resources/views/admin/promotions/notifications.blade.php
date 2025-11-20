@extends('admin.layouts.app')

@section('title', 'Notifications')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Notifications</h4>
        <a href="{{ route('admin.promotions.notifications.create') }}" class="btn btn-primary">+ Add Notification</a>
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
            @forelse($notifications as $notification)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $notification->title }}</td>
                    <td>{{ $notification->start_date }}</td>
                    <td>{{ $notification->end_date }}</td>
                    <td>{{ $notification->status ? 'Active' : 'Inactive' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No notifications found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $notifications->links() }}
</div>
@endsection
