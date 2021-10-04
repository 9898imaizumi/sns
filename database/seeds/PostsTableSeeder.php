<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            ['post' => '1つ目の投稿になります'],
            ['post' => '2つ目の投稿になります'],
            ['post' => '3つ目の投稿になります'],
            ['post' => '4つ目の投稿になります'],
            ['post' => '5つ目の投稿になります']
        ]);
    }
}
