<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoryPostController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view(
            'posts.categories.index',
            [
                'categories' => $categories
            ]
        );
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            abort(404, "Категории не существует");
        }

        $posts = Post::where('category_id', $id)->get();

        return view('posts.categories.show', [
            'category' => $category,
            'posts' => $posts
        ]);
    }
}
