<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * テストユーザー + α
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'テストユーザー',
            'email' => 'test@example.jp',
            'password' => bcrypt('testtest'),
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        DB::table('users')->insert([
            'name' => '宮本武蔵',
            'email' => 'miyamoto@example.jp',
            'password' => bcrypt('Testtest'),
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);

        DB::table('users')->insert([
            'name' => '佐々木小次郎',
            'email' => 'sasaki@example.jp',
            'password' => bcrypt('testtes@'),
            'created_at' => '2020-01-01 00:00:00',
            'updated_at' => '2020-01-01 00:00:00',
        ]);
    }
}
