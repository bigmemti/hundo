<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::latest()->limit(4)->get()->load(['category', 'user'])->loadCount('comments');

        return Inertia::render('Home/Welcome', [
            'posts' => $posts
        ]);
    }
}
