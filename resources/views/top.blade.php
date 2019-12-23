@extends('layouts.common')

@section('content')
    @if(!Auth::check())
        <div id="login-wrapper" class="row">
            <div class="col-7">
                <h1 class="text-white"><b>Hello Hackers!</b></h1>
                <p class="text-white">Qiita風は記事投稿サービスQiitaを模したサービス</p>
            </div>
            <div class="col-5">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <table>
                        <tr>
                            <th>メールアドレス</th>
                            <td>
                                <input type="email" name="email" id="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="test@example.jp"
                                       size="50" value="{{ old('email') }}" name="email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>メールアドレスかパスワードがおかしいぴょん！</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>パスワード</th>
                            <td><input type="password" name="password" id="password" class="form-control"
                                       size="50" name="password" required></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="ログイン" class="form-control"></td>
                        <tr>
                            <th></th>
                            <td>
                                <a href="/password/reset" class="text-white">パスワードを忘れた時</a>
                            </td>
                        </tr>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    @else
    @endif

    <div class="top-wrapper">
        <div class="row">
            <div class="article-wrapper col-md-6">

                {{--ログイン成功のメッセージ--}}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('flash_message') }}
                        You are logged in!
                    </div>
                @endif
                {{--ログイン成功のメッセージ--}}

                @foreach($articles as $article)
                    <div class="article-box">
                        <div class="article-box-left"></div>
                        <div class="article-right">
                            <a href="/drafts/{{ $article->id }}" class="article-title">{{ $article->title }}</a>
                            <div class="article-details">
                                <div class="article-date">{{ $article->created_at }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="paginate">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
