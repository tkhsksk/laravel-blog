@extends('common.layout')

@section('title','ダッシュボード')
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
        <td>{{ \Carbon\Carbon::parse($post->posted_at)->format('Y/m/d') }}</td>
        <td>{{ $post->title }}</td>
        <td><a href="/storage/{{ $post->image }}" target="_blank"><img src="/storage/{{ $post->image }}" style="height:30px;width: 30px;" class="img-fluid object-fit-cover"></a></td>
        <td class="small">{{ $post->caption }}</td>
        <td><a href="{{ route('post.edit', $post->id) }}">編集</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection