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

                    <div class="card-body">
                        <form method="POST" action="/user/edit-name">
                            @csrf
                            <div class="form-group">
                                <label for="password">新しい名前</label>
                                <div>
                                    <input id="password" type="text" class="form-control" name="name" required>
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
