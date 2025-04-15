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
    <form action="{{ route('post.confirm') }}" enctype="multipart/form-data" novalidate="novalidate" method="post" class="border-top pt-3 mt-3">
        @csrf
        <div class="d-flex justify-content-end">
            <input type="date" name="posted_at" value="{{ $post ? old('posted_at',$post->posted_at) : now()->format('Y-m-d') }}" class="form-control mb-3 w-auto">
        </div>
        <input type="hidden" name="id" value="{{ $post ? old('id',$post->id) : old('id') }}">
        <input type="text" name="title" value="{{ $post ? old('title',$post->title) : old('title') }}" class="form-control mb-3">
        <textarea name="body" rows="4">{{ $post ? old('body',$post->body) : old('body') }}</textarea>
        @isset($post)
            {!! $post->image ? '<div class="text-center"><img style="max-height:300px;max-width: 300px;" class="img-fluid object-fit-cover my-3 w-100" src=/storage/'.$post->image.'></div>' : '' !!}
        @else
            <input type="file" name="image">
        @endisset
        <input type="text" name="caption" value="{{ $post ? old('caption',$post->caption) : old('caption') }}" class="form-control mb-3">
        <div class="text-end">
            <button type="submit" class="btn btn-light">confirm</button>
        </div>
    </form>
</main>
@endsection
