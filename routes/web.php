<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostListController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('dashboard')->name('dashboard.')->group(function(){
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('post',PostListController::class,['only'=>['index', 'create', 'store']]);
        Route::resource('category.post', PostController::class)->shallow();
    });

    Route::resource('post.comment', CommentController::class)->shallow();
});

Route::middleware(['land'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('post', ClientPostController::class);
    Route::resource('category', ClientCategoryController::class);
});

require __DIR__.'/auth.php';
