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
            'review' => "Ja was wel okee eigenlijk",
        ]);
    }
}
