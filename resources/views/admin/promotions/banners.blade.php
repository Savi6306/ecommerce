@extends('admin.layouts.app')

@section('content')
<h4>Banner Setup</h4>
<a href="{{ route('admin.promotions.banners.create') }}" class="btn btn-primary mb-3">Add Banner</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Banner</th>
            <th>Status</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($banners as $banner)
        <tr>
            <td>{{ $banner->title }}</td>
            <td>
                @if($banner->banner)
                    <img src="{{ asset('storage/'.$banner->banner) }}" width="120">
                @endif
            </td>
            <td>{{ $banner->status ? 'Active' : 'Inactive' }}</td>
            <td>{{ $banner->start_date }}</td>
            <td>{{ $banner->end_date }}</td>
            <td>
                <a href="{{ route('admin.promotions.banners.edit', $banner) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.promotions.banners.destroy', $banner) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $banners->links() }}
@endsection
