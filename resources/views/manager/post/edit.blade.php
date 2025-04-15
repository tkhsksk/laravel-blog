@extends('common.layout')

@section('title','ポストの編集')
@include('common.head')
@include('common.header')
@section('contents')
<main>
    @if ($errors->any())
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('post.confirm') }}" enctype="multipart/form-data" novalidate="novalidate" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $post ? old('id',$post->id) : old('id') }}">
        <input type="text" name="title" value="{{ $post ? old('title',$post->title) : old('title') }}" class="form-control mb-3">
        <textarea name="body" rows="4">{{ $post ? old('body',$post->body) : old('body') }}</textarea>
        <input type="file" name="image">
        <input type="text" name="caption" value="{{ $post ? old('caption',$post->caption) : old('caption') }}" class="form-control mb-3">
        <input type="date" name="posted_at" value="{{ $post ? old('posted_at',$post->posted_at) : old('posted_at') }}" class="form-control mb-3">
        <button type="submit">confirm</button>
    </form>
</main>
@endsection
