<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => 'DUMMY TITLE',
        'tag1' => 'DUMMY TAG1',
        'tag2' => 'DUMMY TAG2',
        'tag3' => 'DUMMY TAG3',
        'body' => 'DUMMY BODY',
        'likes_count' => 0,
        'created_at' => '2000-01-01 00:00:00',
        'updated_at' => '2000-01-01 00:00:00',
    ];
});
