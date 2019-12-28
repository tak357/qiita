@extends('layouts.common')

@section('content')

    <div class="top-wrapper">
        <div class="row">
            <div class="article-wrapper col-md-6">

                <h2>登録情報</h2>
                <!-- フラッシュメッセージ -->
                @if (session('flash_message'))
                    <div class="flash_message">
                        <div class="alert alert-success">
                            {{ session('flash_message') }}
                        </div>
                    </div>
                @endif

                <div class="article-box">
                    <table class="table table-striped">
                        <tr>
                            <th>ユーザー名</th>
                            <td><a href="/user/edit-name">{{ $auth->name }}</a></td>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
