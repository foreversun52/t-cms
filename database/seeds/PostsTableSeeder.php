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
        $user = \App\Entities\User::first();
        DB::table('posts')->insert([
            [
                'id' => 1,
                'user_id' => $user->id,
                'author_info' => '作者: 陶煜， 上传：陶煜， 拍摄：陶煜',
                'title' => 'hello world',
                'content' => '这是第一篇文章',
                'status' => 'publish',
                'type' => 'post',
                'top' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 2,
                'user_id' => $user->id,
                'author_info' => '作者: 陶煜， 上传：陶煜， 拍摄：陶煜',
                'title' => 'hello world111111',
                'content' => '这是第二篇文章11111111',
                'status' => 'publish',
                'type' => 'post',
                'top' => null,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ]);
    }
}
