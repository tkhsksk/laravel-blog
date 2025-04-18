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
                    <h2 class="main mb-0 h6">@empty($inputs['id'])<span class="num pe-2 text-danger small fw-bold">new</span>@endempty<span class="title">#@isset($inputs['id']){{ getNumberAttribute($inputs['id']) }}@endisset：{{ $inputs['title'] }}</span></h2>
                    <h3 class="date mb-0 small text-black-50">{{ \Carbon\Carbon::parse($inputs['posted_at'])->format('Y.m.d') }}</h3>
                </div>
                <div id="confirm-body">{!! $inputs['body'] !!}</div>
                <!-- 画像削除にチェックが入っていない場合 -->
                @if($inputs['image_deleted'] == 0)
                    <!-- 画像inputがある場合 -->
                    @isset($inputs['image'])
                    <div class="row">
                        <div class="col-6 mb-3">
                            <img src="/storage/{{ $path }}" class="w-100">
                        </div>
                    </div>
                    <input type="hidden" name="image" value="{{ $path }}">
                    <!-- 画像inputがない場合 -->
                    @else
                        <!-- 既存情報を編集している場合 -->
                        @isset($post)
                            <!-- 画像inputがある場合 -->
                            @isset($post->image)
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <img src="{{imagePath($post->image)}}" class="w-100">
                                </div>
                            </div>
                            <!-- 画像削除にチェックが入っている場合 -->
                            @if($inputs['image_deleted'] == 1)
                                <input type="hidden" name="image" value="">
                            <!-- 画像削除にチェックが入っていない場合 -->
                            @else
                                <input type="hidden" name="image" value="{{ imagePath($post->image) }}">
                            @endif
                            @endisset
                        @endisset
                    @endisset
                <!-- 画像削除にチェックが入っている場合 -->
                @else
                    <input type="hidden" name="image" value="">
                @endif
                @isset($inputs['caption'])
                    <p class="text-black-50"><span class="small">{{ $inputs['caption'] }}</span></p>
                @endisset
            </article>
        </div>
        <input type="hidden" name="image_deleted" value="0">
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
