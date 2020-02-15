@extends('layouts.common')

@section('content')

    <div class="top-wrapper">
        <div class="row">
            <div class="article-wrapper col-md-7">

                <!-- ログイン成功のメッセージ -->
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('flash_message') }}
                        You are logged in!
                    </div>
                @endif

                <!-- フラッシュメッセージ -->
                @if (session('flash_message'))
                    <div class="flash_message">
                        <div class="alert alert-success">
                            {{ session('flash_message') }}
                        </div>
                    </div>
                @endif

                <!-- ユーザー登録完了のメッセージ -->
                @if (session('confirmMessage'))
                    <div class="alert alert-success">
                        {{ session('confirmMessage') }}
                    </div>
                @endif

                @foreach($articles as $article)
                    <div class="article-box">
                        <a href="/drafts/{{ $article->id }}">
                            {{--TODO: プロフィール画像がない時の処理--}}
                            <img src="/storage/profile_images/{{ $article->user_id }}.jpg" alt="" width="45">
                        </a>
                        <div class="article-right">
                            <a href="/drafts/{{ $article->id }}" class="article-title">{{ $article->title }}</a>
                            <div class="article-details">
                                <div class="article-date">投稿者：{{ $article->name }}</div>
                                <div class="article-date">投稿日時：{{ $article->created_at }}</div>
                                <div class="article-date">イイネ数：{{ $article->likes_count }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- ページネーション -->
                <div class="paginate">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
