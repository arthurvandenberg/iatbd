<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pets = [
            [
                'Bertus',
                'Kat',
                1,
                true,
                '16-3-2021',
                '2 dagen',
                '€25,- per dag',
            ],
            [
                'Henk',
                'Kat',
                1,
                false,
                NULL,
                NULL,
                NULL,
            ],
            [
                'Oscar',
                'Kat',
                2,
                true,
                '16-3-2021',
                '2 dagen',
                '€25,- per dag',
            ],
        ];

        foreach($pets as $pet){
            DB::table('pets')->insert([
                'name' => $pet[0],
                'kind' => $pet[1],
                'owner_id' => $pet[2],
                'available' => $pet[3],
                'available_date' => $pet[4],
                'length_of_stay' => $pet[5],
                'compensation_amount' => $pet[6],
            ]);
        }
    }
}
