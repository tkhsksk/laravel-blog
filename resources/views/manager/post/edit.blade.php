@extends('common.layout')

@section('title','ポストの編集')
@include('common.head')
@include('common.header')
@section('contents')
<main>
    <form action="{{ route('post.confirm') }}" enctype="multipart/form-data" novalidate="novalidate" method="post" class="border-top pt-3 mt-3">
        @csrf
        <div class="d-flex justify-content-end">
            <input type="date" name="posted_at" value="{{ $post ? old('posted_at',$post->posted_at) : now()->format('Y-m-d') }}" class="form-control mb-3 w-auto">
        </div>
        <input type="hidden" name="id" value="{{ $post ? old('id',$post->id) : old('id') }}">
        <input type="text" name="title" value="{{ $post ? old('title',$post->title) : old('title') }}" class="form-control mb-3">
        <textarea name="body" rows="4">{{ $post ? old('body',$post->body) : old('body') }}</textarea>

        @if(old('image_deleted') == 1)
        <script>
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
        </script>
        @endif
        <div class="form-check mt-2">
            <input type="hidden" name="image_deleted" value="0">
            <input id="image_deleted" class="form-check-input" type="checkbox" name="image_deleted" value="1" {{ old('image_deleted', $post->image_deleted ?? 0) ? 'checked' : '' }}>
            <label class="form-check-label" for="image_deleted">画像を削除する</label>
        </div>

        @isset($post)
            <div class="text-center mb-3">
            {!! $post->image ? '<img style="max-width: 300px;max-height: 300px;" class="img-fluid object-fit-contain mt-3 w-100" src='.imagePath($post->image).'>' : '<input type="file" name="image" class="mt-3">' !!}
            </div>
            @isset($post->image)
                <div class="text-center mb-3">
                    <input type="file" name="image">
                </div>
            @endisset
        @else
            <div class="text-center mb-3">
                <input type="file" name="image">
            </div>
        @endisset
        <input type="text" name="caption" value="{{ $post ? old('caption',$post->caption) : old('caption') }}" class="form-control mb-3">
        <div class="text-end">
            <button type="submit" class="btn btn-light">confirm</button>
        </div>
    </form>
</main>
@endsection
