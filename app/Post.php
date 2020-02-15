<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Like;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'id',
        'user_id',
        'title',
        'tag1',
        'tag2',
        'tag3',
        'body',
        'likes_count',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * リレーション（多対１）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    /**
     * @return mixed
     */
    public function like_by()
    {
        return Like::where('user_id', Auth::user()->id)->first();
    }
}
