<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts= [
            [
                'post_title' => 'Test Post 7',
                'post_slug' => 'test-post-7',
                'post_status' => 1,
                'is_published' =>1,
                'post_content' => 'This is seventh test post.',
                'user_id' => 1,
            ],
            [
                'post_title' => 'Test Post 2',
                'post_slug' => 'test-post-2',
                'post_status' => 1,
                'is_published' =>1,
                'post_content' => 'This is second test post.',
                'user_id' => 1,
            ],
            [
                'post_title' => 'Test Post 3',
                'post_slug' => 'test-post-3',
                'post_status' => 1,
                'is_published' =>1,
                'post_content' => 'This is third test post.',
                'user_id' => 1,
            ],
            [
                'post_title' => 'Test Post 4',
                'post_slug' => 'test-post-4',
                'post_status' => 1,
                'is_published' =>1,
                'post_content' => 'This is fourth test post.',
                'user_id' => 1,
            ],
            [
                'post_title' => 'Test Post 5',
                'post_slug' => 'test-post-5',
                'post_status' => 1,
                'is_published' =>1,
                'post_content' => 'This is fifth test post.',
                'user_id' => 1,
            ],
            [
                'post_title' => 'Test Post 6',
                'post_slug' => 'test-post-6',
                'post_status' => 1,
                'is_published' =>1,
                'post_content' => 'This is sixth test post.',
                'user_id' => 1,
            ],

        ];
        DB::table('posts')->insert($posts);
    }
}
