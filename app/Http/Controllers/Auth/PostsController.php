<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth', array('except' => 'index'));
    }

    public function index()
    {
        return view('auth.drafts.new');
    }

    public function showTopPage()
    {
        $articles = Post::select('posts.*', 'users.name')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('top', ['articles' => $articles]);
    }

    public function postArticle(PostRequest $request)
    {
        // 半角スペースまたは全角スペースで区切る
        $tags = preg_split('/[\s|\x{3000}]+/u', $request->tags);

        $tag1 = $tags[0];
        $tag2 = (isset($tags[1])) ? $tags[1] : null;
        $tag3 = (isset($tags[2])) ? $tags[2] : null;

        $article = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'tag1' => $tag1,
            'tag2' => $tag2,
            'tag3' => $tag3,
            'body' => $request->article,
        ]);

        return redirect("/drafts/{$article->id}");
    }

    public function showArticle($id)
    {
        $article = Post::where('id', $id)->first();

        $post = Post::findOrFail($id);

        //$like = $post->likes()->where('user_id', Auth::user()->id)->first();
        $like = $post->likes()->first();

        return view('auth.item', compact('article'))
            ->with(array('post' => $post, 'like' => $like));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        #クエリ生成
        $query = Post::query();

        #もしキーワードがあったら
        if (!empty($keyword)) {
            $query->where('title', 'like', '%' . $keyword . '%');
        }

        $user = Auth::user();

        #ページネーション
        $items = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('search', ['items' => $items, 'keyword' => $keyword, 'users' => $user]);
    }

    public function edit(Post $post)
    {
//        dd($post);
        // TODO: タグが複数登録されていても１つしか出てこないので修正する。
        return view('auth.drafts.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $tags = explode(' ', $request->tags);
        $post->user_id = Auth::user()->id;
        $post->tag1 = $tags[0];
        $post->tag2 = (isset($tags[1])) ? $tags[1] : null;
        $post->tag3 = (isset($tags[2])) ? $tags[2] : null;

        $post->title = $request->title;
        $post->body = $request->article;

        $post->save();

        return redirect("/drafts/{$post->id}")
            ->with('flash_message', '記事を更新しました。');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/')
            ->with('flash_message', '記事を削除しました。');;
    }
}

