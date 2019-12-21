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
                            <th>ユーザー名</th>
                            <td><input type="text" name="username" id="" class="form-control" placeholder="好きな名前を入れてください"
                                       size="50" value="{{ old('email') }}" name="username" required autofocus></td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td><input type="email" name="username" id="" class="form-control"
                                       placeholder="qiitahuu@qiitahuu.com"
                                       size="50" value="{{ old('email') }}" name="email" required></td>
                        </tr>
                        <tr>
                            <th>パスワード</th>
                            <td><input type="password" name="username" id="" class="form-control"
                                       size="50" name="password" required></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="ログイン" class="form-control"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    @else
    @endif
@endsection
