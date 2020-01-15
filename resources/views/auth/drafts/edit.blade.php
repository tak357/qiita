@extends('layouts.common')

@section('content')
    <form action="{{ action('Auth\PostsController@update', $post) }}" method="post" class="post-page-wrapper">
        @csrf
        {{ method_field(('patch')) }}

        @if($errors->first('title'))
            <div class="validation">{{ $errors->first('title') }}</div>
        @endif()

        <input type="text" name="title" id="title-input" class="form-control m-1" placeholder="タイトルを入力"
               value="{{ old('title', $post->title) }}">

        @if($errors->first('tags'))
            <div class="validation">{{ $errors->first('tags') }}</div>
        @endif
        {{--タグが１つしかない時の間のスペースを削除する--}}
        <input type="text" name="tags" class="form-control m-1" placeholder="タグを半角スペース区切りで入力（3つまで登録可）"
               value="{{ old('tag1', $post->tag1 . ' ' . $post->tag2 . ' ' . $post->tag3 ) }}">

        @if($errors->first('body'))
            <div class="validation">{{ $errors->first('article') }}</div>
        @endif

        <div class="row">
            <div class="col-6 m-1">
                <textarea name="article" id="markdown_editor_textarea" cols="30" rows="10"
                          class="form-control" placeholder="本文を入力">{{ $post->body }}</textarea>
            </div>
            <div class="col-6 m-1">
                <div id="markdown_preview" class="text-muted">プレビュー画面</div>
            </div>
        </div>
        <div class="post-page-footer">
            <input type="submit" value="更新する" class="post-button mt-3 mr-4">
        </div>
    </form>

@endsection
