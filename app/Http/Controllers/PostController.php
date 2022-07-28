<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $post = New Post;
        $post->title       = $request->input('title');
        $post->body        = $request->input('body');

        $post->save();
        $post->categories()->attach($request->input('category'));

        return redirect()->route('posts.index');
    }


    public function addCat(Request $request)
    {

        $category = New Category;
        $category->name = $request->input('name');
        $category->save();

        return response()->json(Category::all());
    }

}
