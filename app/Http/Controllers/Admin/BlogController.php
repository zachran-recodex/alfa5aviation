<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogStoreRequest;
use App\Http\Requests\Admin\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderByDesc('id')->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(BlogStoreRequest $request)
    {
        $blog = new Blog();

        // Update fields with request data
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->status = true;

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $blog->image = 'uploads/blogs/' . $filename;
        }

        $blog->save();

        return redirect()
            ->route('admin.blogs.index')
            ->with('toast', ['type' => 'success', 'message' => 'Blog created successfully.']);
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        // Update fields with request data
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->status = $request->boolean('status', true);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            $file = $request->file('image');
            $filename = time() . '-' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $blog->image = 'uploads/blogs/' . $filename;
        }

        $blog->save();

        return redirect()
            ->route('admin.blogs.index')
            ->with('toast', ['type' => 'success', 'message' => 'Blog updated successfully.']);
    }

    public function destroy(Blog $blog)
    {
        // Delete image from public folder if exists
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }

        $blog->delete();

        return redirect()
            ->route('admin.blogs.index')
            ->with('toast', ['type' => 'danger', 'message' => 'Blog deleted successfully.']);
    }
}
