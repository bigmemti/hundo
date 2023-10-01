<?php

namespace App\Http\Controllers;

use App\Helper\ImageManager;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;

class PostController extends Controller
{
    use ImageManager;

    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $posts = $category->posts->load(['user']);

        return inertia('Category/PostIndex',[
            'posts' => $posts,
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        return inertia('Category/PostCreate', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, Category $category)
    {
        $image = $this->upload($request->image, 'public', 'post')['file_path'];

        $category->posts()->create([
            ...$request->validated(),
            'image' => $image,
            'user_id' => auth()->user()->id
        ]);

        return to_route('dashboard.category.post.index', ['category' => $category]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return inertia('Post/Show', [
            'post' => $post->load(['user','category'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return inertia('Post/Edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $image = $request->image !== null ? $this->swap($post->image, $request->image, 'public')['file_path'] : $post->image;

        $post->update([...$request->validated(), 'image' => $image]);

        return to_route('dashboard.category.post.index', ['category' => $post->category_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->delete($post->image,'public');
        $post->delete();

        return to_route('dashboard.category.post.index', ['category' => $post->category_id]);
    }
}
