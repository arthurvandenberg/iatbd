<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'reviewed_user' => 2,
            'author' => 3,
            'title' => 'GEWELDIG!!!!1!',
            'review' => "Nouja was wel okee eigenlijk..",
        ]);

        DB::table('reviews')->insert([
            'reviewed_user' => 3,
            'author' => 1,
            'title' => 'GEWELDIG!!!!1!',
            'review' => "Nouja was wel okee eigenlijk..",
        ]);

        DB::table('reviews')->insert([
            'reviewed_user' => 2,
            'author' => 5,
            'title' => 'GEWELDIG!!!!1!',
            'review' => "Nouja was wel okee eigenlijk..",
        ]);

        DB::table('reviews')->insert([
            'reviewed_user' => 2,
            'author' => 4,
            'title' => 'GEWELDIG!!!!1!',
            'review' => "Nouja was wel okee eigenlijk..",
        ]);

        DB::table('reviews')->insert([
            'reviewed_user' => 1,
            'author' => 6,
            'title' => 'GEWELDIG!!!!1!',
            'review' => "Nouja was wel okee eigenlijk..",
        ]);
    }
}
