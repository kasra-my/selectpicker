<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('welcome'); });

// Post routes
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/store', [PostController::class, 'store'])->name('post.store');
Route::post('post/addcat', [PostController::class, 'addCat'])->name('post.addcat');


// Category routes
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');


