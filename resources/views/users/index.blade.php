@extends('layouts.common')

@section('content')

    <div class="top-wrapper">
        <div class="row">
            <div class="article-wrapper col-md-8">

                {{--TODO: 自動ログオフしていた時の対処が必要--}}
                <h2>登録情報</h2>
                <!-- フラッシュメッセージ -->
                @if (session('flash_message'))
                    <div class="flash_message">
                        <div class="alert alert-success">
                            {{ session('flash_message') }}
                        </div>
                    </div>
                @endif

                {{--画像を登録しました--}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{--エラーメッセージ--}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="article-box">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>ユーザー名</th>
                            <td><a href="/user/edit-name">{{ $auth->name }}</a></td>
                        </tr>
                        <tr>
                            <th rowspan="2">プロフィール画像</th>
                            <td>
                                @if($is_image)
                                    <figure>
                                        <img src="/storage/profile_images/{{ Auth::id() }}.jpg" alt="プロフィール画像"
                                             width="50px" , height="50px">
                                    </figure>
                                @else
                                    <figure>
                                        <img src="/storage/profile_images/no_image.jpg" alt="NO IMAGE"
                                             width="100px" , height="100px">
                                    </figure>
                                @endif
                            </td>
                        <tr>
                            <td>
                                <form action="/user" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="photo" id="">
                                    <input type="submit" value="送信">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td><a href="/user/edit-mail">{{ $auth->email }}</a></td>
                        </tr>
                        <tr>
                            <th>パスワード</th>
                            <td><a href="/user/edit-password">********</a></td>
                        </tr>
                        <tr>
                            <th>登録日時</th>
                            <td>{{ $auth->created_at }}</td>
                        </tr>
                        <tr>
                            <th>最終更新日時</th>
                            <td>{{ $auth->updated_at }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <ul>
                    <li class="text-muted">ユーザー名、メールアドレス、パスワードはタップすると変更可能です。</li>
                    <li class="text-muted">プロフィール画像は最大2MBまでアップロード可能です。</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
