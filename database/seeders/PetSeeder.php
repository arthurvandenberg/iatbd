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
            ['Henk', 'Kat', 'img/pets/henk_1.jpg', 1, true, '16-3-2021', '2 dagen', '€25,- per dag'],
            ['Oscar', 'Kat', 'img/pets/oscar_1.jpg', 2, true, '17-3-2021', '2 dagen', '€25,- per dag'],
            ['Boris', 'Hond', 'img/pets/boris_1.jpg', 3, true, '26-3-2021', '1 week', '€5,- per dag'],
            ['Hamtaro', 'Hamster', 'img/pets/hamtaro_1.jpg', 4, true, '18-3-2021', '1 dag', '€2,50 per uur'],
            ['Dave en Ria', 'Cavia', 'img/pets/dave_ria_1.jpg', 5, true, '30-3-2021', '1 dag', '€25,-'],
            ['Nemo', 'Goudvis', 'img/pets/nemo_1.jpg', 5, true, '12-6-2021', '1 dag', '€25,-'],
            ['Swiffer en Pixel', 'Cavia', 'img/pets/pixel_swiffer_1.jpg', 6, true, '27-4-2021', '3 dagen', '€12,50 per dag'],
            ['Happy', 'Hond', 'img/pets/happy_1.jpg', 7, true, '18-5-2021', '1 werkdag', '€10 per uur'],
            ['Pooh', 'Beer', 'img/pets/pooh_1.jpg', 8, false, 'per direct', '1 levensduur', '€2.500,- per uur'],
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
