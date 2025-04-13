<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryPostRequest;
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

    public function show(Category $category)
    {
        $posts = $category->posts;

        return view('posts.categories.show', [
            'category' => $category,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.categories.create');
    }

    public function store(StoreCategoryPostRequest $request)
    {
        $category = new Category($request->validated());
        $category->save();

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('posts.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(StoreCategoryPostRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
