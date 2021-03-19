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
            'name' => 'Arthur van den Berg',
            'email' => 'avdberg95@gmail.com',
            'password' => bcrypt('DIERENDIERENDIEREN'),
            'image' => 'img/users/arthur/arthur_1.jpg',
        ]);

        DB::table('users')->insert([
            'name' => 'Benny Bitcoin',
            'email' => 'ben@miner.nl',
            'password' => bcrypt('OMGGRATISGELDMINEN'),
            'image' => 'img/users/benny/benny_1.jpg',
        ]);

        DB::table('users')->insert([
            'name' => 'Eddy Etherium',
            'email' => 'ed@miner.com',
            'password' => bcrypt('GPUSZIJNOMCOINSTEMINEN'),
            'image' => 'img/users/eddy/eddy_1.jpg',
        ]);

        DB::table('users')->insert([
            'name' => 'Linda Litecoin',
            'email' => 'linda@miner.nl',
            'password' => bcrypt('LOLWATZEURENDIEGAMERSNOU'),
            'image' => 'img/users/linda/linda_1.jpg',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Theo Tether',
            'email' => 'theo@miner.nl',
            'password' => bcrypt('IKWASNETTELAATMETBITCOIN'),
            'image' => 'img/users/theo/theo_1.jpg',
        ]);
        
        DB::table('users')->insert([
            'name' => 'Priscilla Polkadot',
            'email' => 'priscilla@miner.nl',
            'password' => bcrypt('DOGECOINISDEHYPEGOZER'),
            'image' => 'img/users/priscilla/priscilla_1.jpg',
        ]);

        DB::table('users')->insert([
            'name' => 'Carlo Cardano',
            'email' => 'carlo@miner.nl',
            'password' => bcrypt('IKSNAPHIEREIGENLIJKNIKSVAN'),
            'image' => 'img/users/carlo/carlo_1.jpg',
        ]);

        DB::table('users')->insert([
            'name' => 'Christopher Robin',
            'email' => 'c.robin@disney.nl',
            'password' => bcrypt('HELPMEAUBVANDIEBEERAF:('),
            'image' => 'img/users/christopher/christopher_1.jpg',
            'blocked' => 1,
        ]);
    }
}
