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
            'image' => 'img/users/arthur/home/home_1.jpg'
        ]);

        DB::table('images')->insert([
            'user_id' => '1',
            'image' => 'img/users/arthur/home/home_2.jpg'
        ]);

        DB::table('images')->insert([
            'user_id' => '2',
            'image' => 'img/users/benny/home/home_1.jpg'
        ]);

        DB::table('images')->insert([
            'user_id' => '3',
            'image' => 'img/users/eddy/home/home_1.jpg'
        ]);
    }
}
