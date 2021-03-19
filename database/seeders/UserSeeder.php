<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Arthur',
            'lastname' => 'van den Berg',
            'age' => '25',
            'email' => 'avdberg95@gmail.com',
            'password' => bcrypt('DIERENDIERENDIEREN'),
            'image' => 'img/users/arthur/arthur_1.jpg',
            'preferred_animals' => 'Honden en katten',
        ]);

        DB::table('users')->insert([
            'name' => 'Benny',
            'lastname' => 'Bitcoin',
            'age' => '30',
            'email' => 'ben@miner.nl',
            'password' => bcrypt('OMGGRATISGELDMINEN'),
            'image' => 'img/users/benny/benny_1.jpg',
            'preferred_animals' => 'Hamsters',
        ]);

        DB::table('users')->insert([
            'name' => 'Eddy',
            'lastname' => 'Etherium',
            'age' => '27',
            'email' => 'ed@miner.com',
            'password' => bcrypt('GPUSZIJNOMCOINSTEMINEN'),
            'image' => 'img/users/eddy/eddy_1.jpg',
            'preferred_animals' => 'Alle dieren',
        ]);

        DB::table('users')->insert([
            'name' => 'Linda',
            'lastname' => 'Litecoin',
            'age' => '38',
            'email' => 'linda@miner.nl',
            'password' => bcrypt('LOLWATZEURENDIEGAMERSNOU'),
            'image' => 'img/users/linda/linda_1.jpg',
            'preferred_animals' => 'Alle knaagdieren',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Theo',
            'lastname' => 'Tether',
            'age' => '19',
            'email' => 'theo@miner.nl',
            'password' => bcrypt('IKWASNETTELAATMETBITCOIN'),
            'image' => 'img/users/theo/theo_1.jpg',
            'preferred_animals' => 'Honden',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Priscilla',
            'lastname' => 'Polkadot',
            'age' => '22',
            'email' => 'priscilla@miner.nl',
            'password' => bcrypt('DOGECOINISDEHYPEGOZER'),
            'image' => 'img/users/priscilla/priscilla_1.jpg',
            'preferred_animals' => 'Alle dieren',
        ]);

        DB::table('users')->insert([
            'name' => 'Carlo',
            'lastname' => 'Cardano',
            'age' => '24',
            'email' => 'carlo@miner.nl',
            'password' => bcrypt('IKSNAPHIEREIGENLIJKNIKSVAN'),
            'image' => 'img/users/carlo/carlo_1.jpg',
            'preferred_animals' => 'Goudvissen',
        ]);

        DB::table('users')->insert([
            'name' => 'Christopher',
            'lastname' => 'Robin',
            'age' => '50',
            'email' => 'c.robin@disney.nl',
            'password' => bcrypt('HELPMEAUBVANDIEBEERAF:('),
            'image' => 'img/users/christopher/christopher_1.jpg',
            'preferred_animals' => 'Geen enkel dier AUB',
            'blocked' => 1,
        ]);
    }
}
