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
            ['Bertus', 'Kat', 'img/pets/bertus_1.jpg', 1, true, '16-3-2021', '2 dagen', '€25,- per dag'],
            ['Henk', 'Kat', 'img/pets/henk_1.jpg', 1, false, NULL, NULL, NULL],
            ['Oscar', 'Kat', 'img/pets/oscar_1.jpg', 2, true, '16-3-2021', '2 dagen', '€25,- per dag'],
            ['Boris', 'Hond', 'img/pets/boris_1.jpg', 3, true, '26-3-2021', '1 week', '€5,- per dag'],
            ['Hamtaro', 'Hamster', 'img/pets/hamtaro_1.jpg', 4, true, '18-3-2021', '1 dag', '€2,50 per uur'],
        ];

        foreach($pets as $pet){
            DB::table('pets')->insert([
                'name' => $pet[0],
                'kind' => $pet[1],
                'image' => $pet[2],
                'owner_id' => $pet[3],
                'available' => $pet[4],
                'available_date' => $pet[5],
                'length_of_stay' => $pet[6],
                'compensation_amount' => $pet[7],
            ]);
        }
    }
}
