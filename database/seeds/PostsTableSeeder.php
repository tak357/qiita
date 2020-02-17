<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 初期記事
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['user_id' => 1,
                'title' => 'テストタイトル１',
                'tag1' => 'テストタグ１',
                'tag2' => 'テストタグ２',
                'tag3' => 'テストタグ３',
                'body' => '# 見出し１

## 見出し２

### 見出し３

```
$ cd ../
```

本文本文本文本文本文本文本文本文',
                'likes_count' => 1,
                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00',
            ],
            [
                'user_id' => 2,
                'title' => 'テストタイトル２',
                'tag1' => 'テストタグ１',
                'tag2' => 'テストタグ２',
                'tag3' => 'テストタグ３',
                'body' => '本文本文本文本文本文本文本文本文',
                'likes_count' => 2,
                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00',
            ],
            [
                'user_id' => 3,
                'title' => 'テストタイトル３',
                'tag1' => 'テストタグ１',
                'tag2' => 'テストタグ２',
                'tag3' => 'テストタグ３',
                'body' => '本文本文本文本文本文本文本文本文',
                'likes_count' => 0,
                'created_at' => '2020-01-01 00:00:00',
                'updated_at' => '2020-01-01 00:00:00',
            ]
        ]);

        // TODO:以下ページネーションの為に記事埋め
        factory(App\Post::class, 50)->create(); //50個のダミーデータを生成
    }
}
