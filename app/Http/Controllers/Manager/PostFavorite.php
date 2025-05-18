<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class PostFavorite extends Controller
{
    public function store(Request $request, $id = '')
    {
        // postの存在チェック
        $postId = $request->post_id;
        $existsPostFromId = DB::table('posts')->where('id', $postId)->exists();
        if (!$existsPostFromId) {
            throw ValidationException::withMessages([
                'id' => ['指定された投稿は存在しません。']
            ]);
        }

        // ユーザーip
        $ip = Request::ip();

        $existsPostFromIP = DB::table('posts')
        ->where('id', $postId)
        ->where('ip_address', $ip)
        ->exists();

        if ($existsPostFromIP) {
            throw ValidationException::withMessages([
                'id' => ['すでに投稿されています。']
            ]);
        }

        $favorite = new Favorite();
        $inputs = $request->all();

        $post = Favorite::updateOrCreate(
            ['id' => $request->id],
            $inputs
        );

        return redirect()->route('dashboard');
    }
}
q