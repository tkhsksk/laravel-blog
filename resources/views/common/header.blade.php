@section('common.header')
<header>
    <div class="row">
        <div class="col-sm-4 col-6 order-1 order-sm-0">
            <div class="text-start">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-link">ログアウト</button>
                </form>
            </div>
        </div>
        <div class="col-sm-4 col-12 order-0 order-sm-1">
            <h1 class="h4 text-center mb-0">@yield('title')</h1>
        </div>
        <div class="col-sm-4 col-6 order-2">
            <div class="text-end">
                @if(Request::routeIs('dashboard'))
                    <a class="btn btn-sm" href="{{ route('post.edit') }}">
                      ポスト登録
                    </a>
                @else
                    <a class="btn btn-sm" href="{{ route('dashboard') }}">
                      ダッシュボード
                    </a>
                @endif
            </div>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger mt-2 small" role="alert">
        <ul class="error-list mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</header>
@endsection