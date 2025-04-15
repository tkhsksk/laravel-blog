@extends('common.layout')

@section('title','ポストの確認')
@include('common.head')
@include('common.header')
@section('contents')
<main>
    <form action="{{ route('post.store') }}" enctype="multipart/form-data" novalidate="novalidate" method="post">
        @csrf
        <div class="border-top pt-3 mt-3">
            <article class="border-start ps-4 py-3 mb-5">
                <div class="d-flex justify-content-between mb-5 pt-3">
                    <h2 class="main mb-0 h6">@empty($inputs['id'])<span class="num pe-2 text-danger small fw-bold">new</span>@endempty<span class="title">#@isset($inputs['id']){{ $inputs['id'] }}@endisset：{{ $inputs['title'] }}</span></h2>
                    <h3 class="date mb-0 small text-black-50">{{ \Carbon\Carbon::parse($inputs['posted_at'])->format('Y.m.d') }}</h3>
                </div>
                <div id="confirm-body">{!! $inputs['body'] !!}</div>
                @isset($inputs['image'])
                <div class="row">
                    <div class="col-6 mb-3">
                        <img src="/storage/{{ $path }}" class="w-100">
                    </div>
                </div>
                    @isset($inputs['caption'])
                        <p class="text-black-50"><span class="small">{{ $inputs['caption'] }}</span></p>
                    @endisset
                <input type="hidden" name="image" value="{{ $path }}">
                @else
                    @isset($post)
                        @isset($post->image)
                        <div class="row">
                            <div class="col-6 mb-3">
                                <img src="/storage/{{$post->image}}" class="w-100">
                            </div>
                        </div>
                        @if($inputs['image_deleted'] == 1)
                            <input type="hidden" name="image" value="">
                        @else
                            <input type="hidden" name="image" value="{{ $post->image }}">
                        @endif
                            @isset($inputs['caption'])
                                <p class="text-black-50"><span class="small">{{ $inputs['caption'] }}</span></p>
                            @endisset
                        @endisset
                    @endisset
                @endisset
            </article>
        </div>
        {{ $inputs['image_deleted'] }}
        <input type="hidden" name="image_deleted" value="{{ $inputs['image_deleted'] }}">
        <input type="hidden" name="id" value="@isset($inputs['id']){{ $inputs['id'] }}@endisset">
        <input type="hidden" name="title" value="{{ $inputs['title'] }}">
        <input type="hidden" name="body" value="{{ $inputs['body'] }}">
        <input type="hidden" name="caption" value="{{ $inputs['caption'] }}">
        <input type="hidden" name="posted_at" value="{{ $inputs['posted_at'] }}">
        <div class="text-end">
            <button type="submit" class="btn btn-light">store</button>
        </div>
    </form>
</main>
@endsection
