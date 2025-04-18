@section('common.head')
<meta charset="utf-8">
@if(Request::routeIs('post.detail'))
	<meta property="og:url" content="{{ route('post.detail', $post->id) }}"/>
	<meta property="og:type" content="blog"/>
	<meta property="og:title" content="{{ $post->title }}"/>
	<meta property="og:description" content="ポスト記事"/>
	<meta property="og:site_name" content="{{ config('app.name') }}"/>
	@isset($post->image)
		<meta property="og:image" content="{{ route('home') }}{{ $post->image }}"/>
	@endisset
@endif
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="@asset('/favicon.png')">
<link href="@asset('/css/bootstrap.min.css')" rel="stylesheet">
<link href="@asset('/css/base.css')" rel="stylesheet">
<script src="@asset('/js/tinymce/tinymce.min.js')"></script>
<script src="@asset('/js/base.js')"></script>
<title>@hasSection('title')@yield('title')｜@endif{{ config('app.name') }}</title>
@endsection