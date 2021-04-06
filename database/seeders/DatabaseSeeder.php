<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UserSeeder::class,
            KindOfPetSeeder::class,
            PetSeeder::class,
            ListingSeeder::class,
            RequestSeeder::class,
            ReviewSeeder::class,
            HomeImageSeeder::class,
        ]);
    }
}
