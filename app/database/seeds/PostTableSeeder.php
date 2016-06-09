<?php

class PostTableSeeder extends Seeder {

    public function run() {

        Post::truncate();
        Post::create([
            'title'=>'My New Job',
            'content'=>'content for my new job',
            'user_id'=> 1
        ]);

        Post::create([
            'title'=>'Good Day',
            'content'=>'content for good day',
            'user_id'=> 2
        ]);

        Post::create([
            'title'=>'Summer',
            'content'=>'content for summer',
            'user_id'=> 3
        ]);
    }
}