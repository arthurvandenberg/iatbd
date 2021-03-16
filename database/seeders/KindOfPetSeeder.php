<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class KindOfPetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kind_of_pets_array = ["Kat", "Hond", "Goudvis", "Cavia", "Hamster"];

        foreach($kind_of_pets_array as $kind_of_pet){
            DB::table('kind_of_pet')->insert([
               'kind' => $kind_of_pet
            ]);
        }
    }
}
