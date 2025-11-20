@extends('admin.layouts.app')

@section('title', 'Brands')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>🏷️ Brands</h3>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">➕ Add Brand</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $key => $brand)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <img src="{{ $brand->image ? asset('storage/'.$brand->image) : asset('images/no-image.png') }}"
                                 width="60" height="60" class="rounded">
                        </td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->slug }}</td>
                        <td>
                            <span class="badge {{ $brand->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($brand->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                            <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this brand?')">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No brands found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $brands->links() }}
    </div>
</div>
@endsection
