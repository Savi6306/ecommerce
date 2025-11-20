@extends('admin.layouts.app')

@section('title', 'Warehouses')

@section('content')
<div class="container mt-4">
    <h3>🏬 Warehouses</h3>
    <a href="{{ route('admin.inventory.warehouse.create') }}" class="btn btn-primary mb-3">➕ Add Warehouse</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th><th>Name</th><th>Location</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($warehouses as $w)
                <tr>
                    <td>{{ $w->id }}</td>
                    <td>{{ $w->name }}</td>
                    <td>{{ $w->location }}</td>
                    <td>
                        <form action="{{ route('admin.inventory.warehouse.destroy', $w->id) }}" method="POST" onsubmit="return confirm('Delete warehouse?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">🗑️</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $warehouses->links() }}
</div>
@endsection
