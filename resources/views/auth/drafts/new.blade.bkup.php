@extends('layouts.common')

@section('content')
    <form action="/drafts/new" method="post" class="post-page-wrapper">
        @csrf

        @if($errors->first('title'))
            <div class="validation">{{ $errors->first('title') }}</div>
        @endif

        <input type="text" name="title" id="title-input" class="form-control m-1" placeholder="タイトル">

        @if($errors->first('tags'))
            <div class="validation">{{ $errors->first('tags') }}</div>
        @endif

        <input type="text" name="tags" class="form-control m-1" placeholder="プログラム技術に対するタグをスペース区切りで3つまで入力">

        @if($errors->first('body'))
            <div class="validation">{{ $errors->first('article') }}</div>
        @endif

        <div class="row">
            <div class="col-6 m-1">
                <textarea name="article" id="markdown_editor_textarea" cols="30" rows="10"
                          class="form-control"></textarea>
            </div>
            <div class="col-6 m-1">
                <div id="markdown_preview"></div>
            </div>
        </div>
        <div class="post-page-footer">
            <input type="submit" value="Qiitaに投稿" class="post-button m-1">
        </div>
    </form>

@endsection
