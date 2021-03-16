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
            'name' => 'Danni Heuts',
            'email' => 'danni@heuts.com',
            'password' => bcrypt('MEERDIERENDIERENDIEREN'),
        ]);
    }
}
