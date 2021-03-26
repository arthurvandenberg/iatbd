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
            'review_by' => 1,
            'title' => 'GEWELDIG!!!!1!',
            'review' => "Nouja was wel okee eigenlijk..",
        ]);

        DB::table('reviews')->insert([
            'reviewed_user' => 2,
            'review_by' => 1,
            'title' => 'GEWELDIG!!!!1!',
            'review' => "Nouja was wel okee eigenlijk..",
        ]);

        DB::table('reviews')->insert([
            'reviewed_user' => 2,
            'review_by' => 1,
            'title' => 'GEWELDIG!!!!1!',
            'review' => "Nouja was wel okee eigenlijk..",
        ]);

        DB::table('reviews')->insert([
            'reviewed_user' => 2,
            'review_by' => 1,
            'title' => 'GEWELDIG!!!!1!',
            'review' => "Nouja was wel okee eigenlijk..",
        ]);

        DB::table('reviews')->insert([
            'reviewed_user' => 2,
            'review_by' => 1,
            'title' => 'GEWELDIG!!!!1!',
            'review' => "Nouja was wel okee eigenlijk..",
        ]);
    }
}
