<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;

class Like extends Model
{
    use CounterCache;

    // you can have more than one counter
    public $counterCacheOptions = [
//        'Product' => ['field' => 'likes_count', 'foreignKey' => 'product_id']
        'Product' => [
            'field' => 'likes_count',
            'foreignKey' => 'post_id',
        ]
    ];

    protected $fillable = ['user_id', 'post_id'];

    public function Post()
    {
        return $this->belongsTo('App\Post');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
