<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
{
    // Fetch all blogs, latest first
    $blogs = Blog::latest()->paginate(10);

    // Return the index view with data
    return view('admin.blogs.index', compact('blogs'));
}
    // Show create form
    public function create()
    {
        return view('admin.blogs.create');
    }

    // Store blog
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|max:2048',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->excerpt = Str::limit(strip_tags($request->content), 150);
        $blog->content = $request->content;
        $blog->status = $request->status;

        // ✅ Use Laravel Storage instead of public_path
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
            $blog->image = 'storage/' . $path;
        }

        $blog->save();

        return redirect()->route('admin.blogs.index')
                         ->with('success', 'Blog created successfully.');
    }

    // Show edit form
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    // Update blog
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|max:2048',
        ]);

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->excerpt = Str::limit(strip_tags($request->content), 150);
        $blog->content = $request->content;
        $blog->status = $request->status;

        // ✅ Handle new image
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            $path = $request->file('image')->store('blogs', 'public');
            $blog->image = 'storage/' . $path;
        }

        $blog->save();

        return redirect()->route('admin.blogs.index')
                         ->with('success', 'Blog updated successfully.');
    }

    // Delete blog
    public function destroy(Blog $blog)
    {
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }

        $blog->delete();

        return back()->with('success', 'Blog deleted successfully.');
    }
}
