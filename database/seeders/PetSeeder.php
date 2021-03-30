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
            ['Bertus', 'Kat', 'bla', 'img/pets/bertus_1.jpg', 1, false],
            ['Henk', 'Kat', 'bla', 'img/pets/henk_1.jpg', 1, false],
            ['Oscar', 'Kat', 'bla', 'img/pets/oscar_1.jpg', 2, false],
            ['Boris', 'Hond', 'bla', 'img/pets/boris_1.jpg', 3, false],
            ['Hamtaro', 'Hamster', 'bla', 'img/pets/hamtaro_1.jpg', 4, false],
            ['Dave en Ria', 'Cavia', 'bla', 'img/pets/dave_ria_1.jpg', 5, false],
            ['Nemo', 'Goudvis', 'bla', 'img/pets/nemo_1.jpg', 5, false],
            ['Swiffer en Pixel', 'Cavia', 'bla', 'img/pets/pixel_swiffer_1.jpg', 6, false],
            ['Happy', 'Hond', 'bla', 'img/pets/happy_1.jpg', 7, false],
            ['Pooh', 'Beer', 'bla', 'img/pets/pooh_1.jpg', 8, true],
        ];

        foreach($pets as $pet){
            DB::table('pets')->insert([
                'name' => $pet[0],
                'kind' => $pet[1],
                'description' => $pet[2],
                'image' => $pet[3],
                'owner_id' => $pet[4],
                'suspended' => $pet[5]
            ]);
        }
    }
}
