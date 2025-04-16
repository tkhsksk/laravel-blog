@extends('common.layout_login')

@section('title','ログイン')
@include('common.head')
@section('contents')
<main class="d-flex justify-content-center">
    <div class="signin-form w-100">
        <h2 class="form-title fw-bold mb-4">@yield('title')</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="text-end">
            <button type="submit" class="btn">ログイン</button>
        </div>
        </form>
    </div>
</main>
@endsection
