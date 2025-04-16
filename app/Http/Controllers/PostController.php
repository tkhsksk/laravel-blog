<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('home', [
            'posts' => $posts,
        ]);
    }

    public function detail($id = '')
    {
        $post = new Post;
        $post = Post::find($id);

        return view('post.detail', [
            'post' => $post,
        ]);
    }
}
