<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // ログインフォームを表示
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function login(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // ユーザーを取得
        $user = User::where('email', $request->email)->first();

        // ユーザーが存在し、パスワードが一致する場合にログイン
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            // ログイン後にリダイレクト
            return redirect()->route('dashboard');
        }

        // ログイン失敗時
        return back()->withErrors([
            'email' => 'これらの認証情報ではログインできません。',
        ]);
    }

    // ログアウト処理
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

