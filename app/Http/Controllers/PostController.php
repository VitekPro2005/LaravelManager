<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderByDesc('id')->paginate(5);

/*        $posts = Post::select('id', 'title')
            ->orderByDesc('id')
            ->pluck('title', 'id');*/

        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        //$post = Post::find($id);

   /*     if (is_null($post)) {
            abort(404);
        }*/

      //  $category = Category::find($post->category_id);

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {

        $categories = Category::all();

        return view('posts.create', [
            'categories' => $categories
        ]);
    }

    public function store(StorePostRequest $request)
    {
        /*Post::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
        ]);*/
        $post = new Post();
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->content = $request->input('content');

        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit(int $id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        if (is_null($post)) {
            abort(404, 'Поста не существует');
        }

        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(StorePostRequest $request, Post $post)
    {
       // $post = Post::find($id);

        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->content = $request->input('content');

        $post->save();

    /*    $post->update([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
        ]);*/

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Post $post)
    {
       // $post = Post::find($id);
        $post->delete();
        //Post::destroy($id);

        return redirect()->route('posts.index');
    }

    public function download()
    {
        $filename = storage_path('app/posts.json');

        return response()->download($filename);
    }
}
