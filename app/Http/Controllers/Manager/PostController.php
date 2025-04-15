<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function edit(Request $request, $id = '')
    {
        $post = new Post;
        $post = Post::find($id);

        return view('manager.post.edit', [
            'post' => $post,
        ]);
    }

    public function confirm(Request $request, ImageUploadService $imageUploadService)
    {
        $this->check($request);
        $inputs = $request->all();

        $path = $request->file('image') ? $imageUploadService->upload($request->file('image'), 'temp') : '';

        return view('manager.post.confirm', [
            'inputs' => $inputs,
            'path'   => $path,
        ]);
    }

    public function store(Request $request, $id = '')
    {
        $this->checkConfirm($request);

        $post = new Post();
        $inputs = $request->all();

        $post = Post::updateOrCreate(
            ['id' => $request->id],
            $inputs
        );

        return redirect()->route('dashboard');
    }

    protected function check(Request $request)
    {
        $credentials = $request->validate(Post::RULES);

        return null;
    }

    protected function checkConfirm(Request $request)
    {
        $rules = Post::RULES;
        $rules['image'] = ['nullable', 'string'];
        $credentials = $request->validate($rules);

        return null;
    }
}
