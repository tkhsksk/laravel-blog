@extends('common.layout')

@section('title','ダッシュボードpushテスト')
@include('common.head')
@include('common.header')
@section('contents')
<table class="table">
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
        <td>{{ $post->id }}</td>
        <!-- <td>{{ $post->created_at }}</td> -->
        <td>{{ $post->posted_at }}</td>
        <td>{{ $post->title }}</td>
        <td><img src="/storage/{{ $post->image }}"></td>
        <td>{{ $post->caption }}</td>
        <td><a href="{{ route('post.edit', $post->id) }}">編集</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection