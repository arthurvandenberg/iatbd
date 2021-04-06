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
            ['Bertus', 'Kat', 'Luie kitten die het liefst de hele dag in het zonnetje ligt te slapen.', 'img/pets/bertus_1.jpg', 1, false],
            ['Henk', 'Kat', 'Een beetje een bangerd, maar zodra hij een beetje is opgewarmd een enorm gezellige poes!', 'img/pets/henk_1.jpg', 1, false],
            ['Oscar', 'Kat', 'Bijdehand beest, stiekem wel lief.', 'img/pets/oscar_1.jpg', 2, false],
            ['Boris', 'Hond', 'Blij ei.', 'img/pets/boris_1.jpg', 3, false],
            ['Hamtaro', 'Hamster', 'Dotje, eet meer dan je ooit voor mogelijk zou houden...', 'img/pets/hamtaro_1.jpg', 4, false],
            ['Dave en Ria', 'Cavia', 'Deze twee druiven vreten je arm, pas maar op.', 'img/pets/dave_ria_1.jpg', 5, false],
            ['Nemo', 'Goudvis', 'Goudvis met sterallures, vertelt een hoop grapjes...', 'img/pets/nemo_1.jpg', 5, false],
            ['Swiffer en Pixel', 'Cavia', 'Gezellig stel Cavia\'s, vermaken zich prima samen.' , 'img/pets/pixel_swiffer_1.jpg', 6, false],
            ['Happy', 'Hond', 'De meest blije hond die je ooit tegen gaat komen, geloof je me niet? Just wait and see...', 'img/pets/happy_1.jpg', 7, false],
            ['Pooh', 'Beer', 'Lief beest hoor, maar niet heel slim...', 'img/pets/pooh_1.jpg', 8, true],
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
