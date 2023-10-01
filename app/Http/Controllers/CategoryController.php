<?php

namespace App\Http\Controllers;

use App\Helper\ImageManager;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    use ImageManager;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all(['id','name','created_at']);

        return inertia('Category/Index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $image = $this->upload($request->image, 'public', 'category')['file_path'];

        Category::create([...$request->validated(), 'image' => $image]);

        return to_route('dashboard.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->limit(5)->get()->load(['user']);

        return inertia('Category/Show', [
            'category' => $category,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return inertia('Category/Edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $image = $request->image !== null ? $this->swap($category->image, $request->image, 'public')['file_path'] : $category->image;

        $category->update([...$request->validated(), 'image' => $image]);

        return to_route('dashboard.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!$category->posts()->count()) {
            $this->delete($category->image,'public');
            $category->delete();

            return to_route('dashboard.category.index');
        }
        return back()->withErrors('this category have post.');
    }
}
