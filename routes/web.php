<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('home', ["title" => "Home", "active" => 'home']);
});

Route::get('/about', function () {
    return view(
        'about',
        [
            "active" => 'about',
            "name" => "Awank Kaley",
            "email" => "awank@gmail.com",
            "title" => "About"
        ]
    );
});

Route::get('/blogs', [PostController::class, 'index']);

Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [PostController::class, 'categories']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');;

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')
    ->middleware('permission:manage categories');
 
