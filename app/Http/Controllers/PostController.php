<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('blogs', [
            "title" => "All Posts " . $title,
            "active" => "posts",
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function categories()
    {
        return view('categories', [
            'title' => 'Post Categories',
            "active" => "categories",
            'categories' => Category::all(),
        ]);
    }

    public function show(Post $post)
    {
        return view('blog', [
            "post" => $post,
            "active" => "posts",
            "title" => "Single Post"
        ]);
    }
}
