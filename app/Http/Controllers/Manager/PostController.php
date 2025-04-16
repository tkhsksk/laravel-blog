<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $user = Auth::user();
        $userId = $user->id;

        $path = $request->file('image') ? $imageUploadService->upload($request->file('image'), 'temp/'.$userId) : '';
        $post = null;

        if ($request->filled('id')) {
            $post = Post::find($request->id); // or findOrFail($request->id) でもOK
        }

        return view('manager.post.confirm', [
            'inputs' => $inputs,
            'path'   => $path,
            'post'   => $post,
        ]);
    }

    public function store(Request $request, $id = '')
    {
        $this->checkConfirm($request);

        $post = new Post();
        $inputs = $request->all();
        $user = Auth::user();
        $userId = $user->id;

        $sourcePath = $request->image;
        $destinationPath = basename($request->image);

        // 画像inputがあればファイル移動
        $moved = $sourcePath ? Storage::disk('public')->move($sourcePath, $destinationPath) : '';

        if ($moved)
            $files = Storage::disk('public')->files('temp/'.$userId);
            Storage::disk('public')->delete($files);

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
