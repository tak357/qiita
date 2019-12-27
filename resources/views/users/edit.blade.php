@extends('layouts.common')

@section('content')

    <div class="top-wrapper">
        <div class="row">
            <div class="article-wrapper col-md-6">
                <h2>登録情報</h2>
                <div class="article-box">
                    ユーザー名
                    {{ $auth->name }}
                    メールアドレス
                    {{ $auth->email }}
                    登録日時
                    {{ $auth->created_at }}
                    最終更新日時
                    {{ $auth->updated_at }}
                </div>
            </div>
        </div>
    </div>

@endsection
