<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BlogUpdateRequest;
use App\Http\Requests\Dashboard\BlogStoreRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderByDesc('id')->paginate(10);

        return view('dashboard.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogStoreRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blog', 'public');
        }

        $validated['is_active'] = true;

        Blog::create($validated);

        return redirect()->route('dashboard.blog.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'Blog created successfully.',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $validated = $request->validated();

        if ($validated['title'] !== $blog->title) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $validated['image'] = $request->file('image')->store('blog', 'public');
        }

        $blog->update($validated);

        return redirect()->route('dashboard.blog.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'Blog updated successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('dashboard.blog.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'Blog deleted successfully.',
        ]);
    }
}
