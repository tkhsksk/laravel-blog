@extends('common.layout')

@section('title','ダッシュボード')
@include('common.head')
@include('common.header')
@section('contents')
<div class="table-responsive">
<table class="table text-nowrap">
    <thead>
        <tr>
            <th></th>
            <!-- <th></th> -->
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
        <td><a href="{{ route('post.edit', $post->id) }}">{{ $post->id }}</a></td>
        <!-- <td>{{ $post->created_at }}</td> -->
        <td>{{ \Carbon\Carbon::parse($post->posted_at)->format('Y/m/d') }}</td>
        <td>{{ $post->title }}</td>
        <td>@isset($post->image)<a href="{{ imagePath($post->image) }}" target="_blank"><img src="{{ imagePath($post->image) }}" style="height:30px;width: 30px;min-width: 30px;" class="img-fluid object-fit-cover"></a>@endisset</td>
        <td class="small">{{ $post->caption }}</td>
        <td><a href="{{ route('post.edit', $post->id) }}">編集</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>
<div class="d-flex justify-content-end">
{{ $posts->links('vendor.pagination.default') }}
</div>
@endsection