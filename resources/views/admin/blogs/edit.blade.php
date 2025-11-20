@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Blog</h2>

    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" 
                   name="title" 
                   class="form-control @error('title') is-invalid @enderror" 
                   value="{{ old('title', $blog->title) }}" 
                   required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Content --}}
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" 
                      rows="6" 
                      class="form-control @error('content') is-invalid @enderror" 
                      required>{{ old('content', $blog->content) }}</textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                <option value="draft" {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" 
                   name="image" 
                   class="form-control @error('image') is-invalid @enderror" 
                   accept="image/*" 
                   onchange="previewImage(event)">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                @if($blog->image)
                    <img id="preview" 
                         src="{{ asset($blog->image) }}" 
                         alt="Current Image" 
                         style="max-height: 150px; border-radius: 8px;">
                @else
                    <img id="preview" 
                         src="#" 
                         alt="Preview" 
                         style="display:none; max-height: 150px; border-radius: 8px;">
                @endif
            </div>
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn btn-success">Update Blog</button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const preview = document.getElementById('preview');
        preview.src = reader.result;
        preview.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
