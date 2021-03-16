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
        ]);

        DB::table('users')->insert([
            'name' => 'Benny Bitcoin',
            'email' => 'ben@miner.nl',
            'password' => bcrypt('OMGGRATISGELDMINEN'),
        ]);

        DB::table('users')->insert([
            'name' => 'Eddy Etherium',
            'email' => 'ed@miner.com',
            'password' => bcrypt('GPUSZIJNOMCOINSTEMINEN'),
        ]);

        DB::table('users')->insert([
            'name' => 'Linda Litecoin',
            'email' => 'linda@miner.nl',
            'password' => bcrypt('LOLWATZEURENDIEGAMERSNOU'),
        ]);
    }
}
