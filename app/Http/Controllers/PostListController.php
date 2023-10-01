<?php

namespace App\Http\Controllers;

use App\Helper\ImageManager;
use App\Http\Requests\StorePostWithCategoryRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostListController extends Controller
{
    use ImageManager;

    public function index(){
        $posts = Post::all()->load(['user','category']);

        return inertia('Post/Index',[
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return inertia('Post/Create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostWithCategoryRequest $request, Category $category)
    {
        $image = $this->upload($request->image, 'public', 'post')['file_path'];

        Post::create([
            ...$request->validated(),
            'image' => $image,
            'user_id' => auth()->user()->id
        ]);

        return to_route('dashboard.post.index');
    }
}
