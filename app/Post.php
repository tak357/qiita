<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Like;

class Post extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'tag1',
        'tag2',
        'tag3',
        'body'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function like_by()
    {
        return Like::where('user_id', Auth::user()->id)->first();
    }
}
