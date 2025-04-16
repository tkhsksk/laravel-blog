@section('common.head')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="@asset('/favicon.png')">
<link href="@asset('/css/bootstrap.min.css')" rel="stylesheet">
<link href="@asset('/css/base.css')" rel="stylesheet">
<script src="@asset('/js/tinymce/tinymce.min.js')"></script>
<script src="@asset('/js/base.js')"></script>
<title>@hasSection('title')@yield('title')｜@endif{{ config('app.name') }}</title>
@endsection