<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'sample_book_title 1',
            'category_id' => 1,
            'comment' => 'Awesome book!',
            'stars' => 5,
        ]);
        
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'sample_book_title 2',
            'category_id' => 2,
            'comment' => 'Good book!',
            'stars' => 4,
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'sample_book_title 3',
            'category_id' => 3,
            'comment' => 'Not bad',
            'stars' => 3,
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'sample_book_title 4',
            'category_id' => 4,
            'comment' => 'Bad book',
            'stars' => 2,
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'sample_book_title 5',
            'category_id' => 5,
            'comment' => 'Terrible book!',
            'stars' => 1,
        ]);
    }
}
