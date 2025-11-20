@extends('admin.layouts.app')

@section('title', 'Product Attributes')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>🎨 Product Attributes</h3>
        <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary">➕ Add Attribute</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($attributes as $key => $attribute)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $attribute->name }}</td>
                <td>{{ $attribute->slug }}</td>
                <td>
                    <span class="badge {{ $attribute->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($attribute->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                    <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this attribute?')">🗑️</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">No attributes found</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $attributes->links() }}
</div>
@endsection
