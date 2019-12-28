@extends('layouts.common')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">パスワード変更</div>

                    {{--パスワード変更成功--}}
                    @if (session('change_password_success'))
                        <div class="container mt-2">
                            <div class="alert alert-success">
                                {{session('change_password_success')}}
                            </div>
                        </div>
                    @endif

                    {{-- パスワード変更失敗 --}}
                    @if (session('change_password_error'))
                        <div class="container mt-2">
                            <div class="alert alert-danger">
                                {{session('change_password_error')}}
                            </div>
                        </div>
                    @endif

                    {{-- パスワード変更失敗 --}}
                    @if ($errors->has('new-password'))
                        <div class="container mt-2">
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('new-password') }}</strong>
                            </div>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="/user/edit-password">
                            @csrf
                            <div class="form-group">
                                <label for="current">現在のパスワード</label>
                                <div>
                                    <input id="current" type="password" class="form-control" name="current-password"
                                           required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">新しいパスワード</label>
                                <div>
                                    <input id="password" type="password" class="form-control" name="new-password"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm">新しいパスワード（確認用）</label>
                                <div>
                                    <input id="confirm" type="password" class="form-control"
                                           name="new-password_confirmation" required>
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
