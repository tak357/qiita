@extends('layouts.common')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">パスワード変更</div>

                    {{--TODO: メールアドレスのバリデーション--}}
                    <div class="card-body">
                        <form method="POST" action="/user/edit-mail">
                            @csrf
                            <div class="form-group">
                                <label for="password">新しいメールアドレス</label>
                                <div>
                                    <input id="email" type="text" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">変更</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
