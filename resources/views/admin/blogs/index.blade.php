@extends('admin.layouts.app')

@section('title', 'Blogs')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>📝 Blogs</h3>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">➕ Add Blog</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $blog->title }}</td>
                <td>{{ ucfirst($blog->status) }}</td>
                <td>
                    @if($blog->image && file_exists(public_path($blog->image)))
                        <img src="{{ asset($blog->image) }}" width="60" alt="Image">
                    @else
                        —
                    @endif
                </td>
                <td>{{ $blog->created_at->format('d M Y, h:i A') }}</td>
                <td>
                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-primary mb-1">✏️ Edit</a>

                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger mb-1" 
                            onclick="return confirm('Are you sure you want to delete this blog?')">🗑️ Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No blogs found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
