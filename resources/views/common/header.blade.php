@section('common.header')
<header>
<div class="row">
    <div class="col-4">
        <div class="text-start">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-link">ログアウト</button>
            </form>
        </div>
    </div>
    <div class="col-4">
        <h1 class="h4 text-center mb-0">@yield('title')</h1>
    </div>
    <div class="col-4">
        <div class="text-end">
            <a class="btn btn-sm" href="{{ route('post.edit') }}">
              ポスト登録
            </a>
        </div>
    </div>
</div>
</header>
    @endsection