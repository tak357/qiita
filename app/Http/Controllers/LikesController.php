<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function store(Request $request, $postId)
    {
        Like::create(
            array(
                'user_id' => Auth::user()->id,
                'post_id' => $postId,
            )
        );

        $post = Post::findOrFail($postId);

        return redirect()
            ->action('Auth\PostController@show', $postId);
    }

    public function destroy($postId, $likeId)
    {
        $post = Post::findOrFail($postId);
        $post->like_by()->findOrFail($likeId)->delete();

        return redirect()
            ->action('Auth\PostsController@show', $post->id);
    }
}
