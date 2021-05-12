<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class HomeImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'user_id' => '1',
            'image' => 'img/users/arthur/home/home_1_1920.jpg',
            'image640' => 'img/users/arthur/home/home_1_640.jpg',
            'image1280' => 'img/users/arthur/home/home_1_1280.jpg',
            'image1920' => 'img/users/arthur/home/home_1_1920.jpg'
        ]);

        DB::table('images')->insert([
            'user_id' => '1',
            'image' => 'img/users/arthur/home/home_2_1920.jpg',
            'image640' => 'img/users/arthur/home/home_2_640.jpg',
            'image1280' => 'img/users/arthur/home/home_2_1280.jpg',
            'image1920' => 'img/users/arthur/home/home_2_1920.jpg'
        ]);

        DB::table('images')->insert([
            'user_id' => '2',
            'image' => 'img/users/benny/home/home_1_1920.jpg',
            'image640' => 'img/users/benny/home/home_1_640.jpg',
            'image1280' => 'img/users/benny/home/home_1_1280.jpg',
            'image1920' => 'img/users/benny/home/home_1_1920.jpg'
        ]);

        DB::table('images')->insert([
            'user_id' => '3',
            'image' => 'img/users/eddy/home/home_1_1920.jpg',
            'image640' => 'img/users/eddy/home/home_1_640.jpg',
            'image1280' => 'img/users/eddy/home/home_1_1280.jpg',
            'image1920' => 'img/users/eddy/home/home_1_1920.jpg'
        ]);
    }
}
