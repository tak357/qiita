@extends('layouts.common')

@section('content')

    <div class="item-page-wrapper row">
        <div class="item-wrapper col-7">
            <div class="item-header">

                <!-- フラッシュメッセージ -->
                @if (session('flash_message'))
                    <div class="flash_message">
                        <div class="alert alert-success">
                            {{ session('flash_message') }}
                        </div>
                    </div>
                @endif

                <div class="date">
                    {{$article->created_at}}
                    @if (Auth::check())
                        @if(Auth::user()->id === $article->user_id)
                            <a class="edit header-menu"
                               href="{{ action('Auth\PostsController@edit', $post) }}">[記事編集]</a>
                            <a class="del header-menu" href="#" data-id="{{ $post->id }}">[記事削除]</a>
                            <form method="post" action="{{ url('/drafts', $post->id) }}" id="form_{{$post->id}}">
                                @csrf
                                {{ method_field('delete') }}
                            </form>
                        @endif
                    @endif
                </div>
                <div class="item-title">{{ $article->title}}</div>
                <div class="item-tags">

                    <div class="item-tag">{{ $article->tag1 }}</div>
                    @if($article->tag2)
                        <div class="item-tag">{{ $article->tag2 }}</div>
                    @endif

                    @if($article->tag3)
                        <div class="item-tag">{{ $article->tag3 }}</div>
                    @endif
                </div>
                <div class="item-body">{{ $article->body }}</div>

                {{--いいねボタン--}}
                <div class="like">
                    @if (Auth::check())
                        @if ($like)
                            {{ Form::model($post, array('action' => array('LikesController@destroy', $post->id, $like->id))) }}
                            <button type="submit">
                                <img src="/images/icon_heart_red.png">
                                Like {{ $post->likes_count }}
                            </button>
                            {!! Form::close() !!}
                        @else
                            {{ Form::model($post, array('action' => array('LikesController@store', $post->id))) }}
                            <button type="submit">
                                <img src="/images/icon_heart.png">
                                Like {{ $post->likes_count }}
                            </button>
                            {!! Form::close() !!}
                        @endif
                    @endif
                </div>
                {{--いいねボタン--}}

            </div>
        </div>
    </div>
    <script src="/js/main.js"></script>
@endsection
