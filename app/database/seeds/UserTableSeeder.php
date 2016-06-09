<?php

class UserTableSeeder extends Seeder {

    public function run(){

        User::truncate();

        User::create([
            'username'=>'cristian',
            'email'=>'cristian@blog.com',
            'password'=>'1234'
        ]);

        User::create([
            'username'=>'michael',
            'email'=>'michael@blog.com',
            'password'=>'1234'
        ]);

        User::create([
            'username'=>'rachel',
            'email'=>'rachel@blog.com',
            'password'=>'1234'
        ]);

    }
}