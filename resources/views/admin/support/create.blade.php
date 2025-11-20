@extends('admin.layouts.app')
@section('title','Create Ticket')

@section('content')
<div class="container mt-4">
    <h1>Create Support Ticket</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.support.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Subject</label>
            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
        </div>
        <div class="mb-3">
            <label>Message</label>
            <textarea name="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('admin.support.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
