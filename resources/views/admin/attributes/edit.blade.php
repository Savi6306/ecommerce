@extends('admin.layouts.app')

@section('title', 'Edit Product Attribute')

@section('content')
<div class="container mt-4">
    <h3>✏️ Edit Product Attribute</h3>

    {{-- Show validation errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Attribute Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Attribute Name</label>
            <input type="text" name="name" class="form-control" value="{{ $attribute->name }}" required>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $attribute->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $attribute->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-success">Update Attribute</button>
        <a href="{{ route('admin.attributes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
