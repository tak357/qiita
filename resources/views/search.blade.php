@extends('layouts.common')

@section('content')
    <div class="top-wrapper">
        <div class="row">
            <div class="article-wrapper col-md-6">
                <h2>「{{ $keyword }}」の検索結果</h2>
                @foreach($items as $item)
                    <div class="article-box">
                        <div class="article-box-left"></div>
                        <div class="article-right">
                            <div class="article-details">
                                <div class="text-secondary">
                                    {{ $item->created_at }}に投稿
                                </div>
                                <a href="/drafts/{{ $item->id }}" class="article-title">{{ $item->title }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="paginate">
                    {{ $items->appends(['keyword' => $keyword])->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
