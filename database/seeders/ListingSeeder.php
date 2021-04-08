<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listings = [
            [1, true, '2021/4/16', '2021/5/2', '€25,- per dag'],
            [2, true, '2021/4/16', '2021/4/18', '€25,- per dag'],
            [3, true, '2021/4/16', '2021/5/2', '€25,- per dag'],
            [4, true, '2021/4/16', '2021/5/2', '€5,- per dag'],
            [5, true, '2021/4/16', '2021/5/2', '€2,50 per uur'],
            [6, true, '2021/4/16', '2021/5/2', '€25,-'],
            [7, true, '2021/4/16', '2021/5/2', '€25,-'],
            [8, true, '2021/4/16', '2021/5/2', '€12,50 per dag'],
            [9, true, '2021/4/16', '2021/5/2', '€10 per uur'],
            [10, false, '2021/4/16', '2021/5/2', '€2.500,- per uur'],
        ];

        foreach($listings as $listing){
            DB::table('listings')->insert([
                'pet_id' => $listing[0],
                'available' => $listing[1],
                'available_date' => $listing[2],
                'end_of_stay' => $listing[3],
                'compensation_amount' => $listing[4],
            ]);
        }
    }
}
