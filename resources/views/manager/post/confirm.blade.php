@extends('common.layout')
@include('common.head')
@section('contents')
<main>
    @if ($errors->any())
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('post.store') }}" enctype="multipart/form-data" novalidate="novalidate" method="post">
        @csrf
        <input type="hidden" name="id" value="@isset($inputs['id']){{ $inputs['id'] }}@endisset">
        <p class="mb-0">{{ $inputs['title'] }}</p>
        <input type="hidden" name="title" value="{{ $inputs['title'] }}">
        <p class="mb-0">{{ $inputs['body'] }}</p>
        <input type="hidden" name="body" value="{{ $inputs['body'] }}">
        <img src="/storage/{{ $path }}">
        <input type="hidden" name="image" value="{{ $path }}">
        <p class="mb-0">{{ $inputs['caption'] }}</p>
        <input type="hidden" name="caption" value="{{ $inputs['caption'] }}">
        <p class="mb-0">{{ $inputs['posted_at'] }}</p>
        <input type="hidden" name="posted_at" value="{{ $inputs['posted_at'] }}">
        <button type="submit">store</button>
    </form>
</main>
@endsection
