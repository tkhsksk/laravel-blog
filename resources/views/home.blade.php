@extends('common.layout_home')

@section('title','')
@include('common.head')
@include('common.header_home')

@section('contents')
@foreach($posts as $post)
<article class="border-start ps-4 py-3 mb-5">
    <div class="d-flex justify-content-between mb-5 pt-3">
        <a href="{{ route('post.detail', $post->id) }}" class="text-decoration-none text-black"><h2 class="main mb-0 h6">@if ($post->id === \App\Models\Post::max('id'))<span class="num pe-2 text-danger small fw-bold">new</span>@endif<span class="title">#{{ getNumberAttribute($post->id) }}：{{ $post->title }}</span></h2></a>
        <h3 class="date mb-0 small text-black-50">{{ \Carbon\Carbon::parse($post->posted_at)->format('Y.m.d') }}</h3>
    </div>
    <div id="confirm-body" class="txt-limit">{!! $post->body !!}</div>
    @isset($post->image)
        <div class="row">
            <div class="col-6 mb-3">
                <img src="{{ imagePath($post->image) }}" class="w-100">
            </div>
        </div>
        @isset($post->caption)
            <p class="text-black-50"><span class="small">{{ $post->caption }}</span></p>
        @endisset
    @endisset
</article>
@endforeach
<div class="d-flex justify-content-end"> 
{{ $posts->links('vendor.pagination.default') }}
</div>
@endsection