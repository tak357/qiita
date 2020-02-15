<nav class="navbar navbar-expand-lg navbar-light pl-5 pr-5 pt-2 pb-2 fixed-top">
    <a href="/" class="navbar-brand text-white">Laravel</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber"
            aria-expanded="false" aria-label="ナビゲーションの切替">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="Navber">
        <form action="{{ route('search') }}" class="form-inline my-2 my-lg-0 ml-2">
            <input type="search" class="form-control mr-sm-2" method="get" name="keyword"
                   placeholder="キーワードを入力" aria-label="検索...">
            <input type="submit" value="検索" class="btn btn-primary">
        </form>

        <ul class="navbar-nav ml-auto mr-5">
            <!-- テストユーザーログイン機能 -->
            @if(!Auth::check())
                <form action="{{ route('login') }}" method="POST" class="">
                    @csrf
                    <input type="hidden" name="email" value="test@example.jp">
                    <input type="hidden" name="password" value="testtest">
                    <button type="submit" class="btn btn-lg btn-danger">テストユーザーでログイン</button>
                </form>
            @endif

            @if (Auth::check())
                <li class="nav-item ml-2">
                    <div class="nav-link text-white">「 {{ Auth::user()->name }} 」でログイン中</div>
                </li>
                <li class="nav-item ml-4"><a href="/drafts/new" id="post-link" class="nav-link text-white">投稿する</a></li>
                <li class="nav-item ml-4"><a href="/user" id="" class="nav-link text-white">登録情報</a></li>
                <li class="nav-item ml-4"><a href="{{ route('logout') }}"
                                             class="nav-link text-white"
                                             onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
                </li>
                <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
                    @csrf
                </form>
            @else
                <li class="nav-item ml-2">
                    <a href="/register" class="nav-link text-white pl-2" id="register">ユーザー登録</a>
                </li>
                <li class="nav-item ml-2">
                    <a href="/login" class="nav-link text-white pl-2">ログイン</a>
                </li>
            @endif
        </ul>
</nav>
