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
            'age' => 25,
            'email' => 'avdberg95@gmail.com',
            'password' => bcrypt('DIERENDIERENDIEREN'),
            'image' => 'img/users/arthur/arthur_1_1920.jpg',
            'image640' => 'img/users/arthur/arthur_1_640.jpg',
            'image1280' => 'img/users/arthur/arthur_1_1280.jpg',
            'image1920' => 'img/users/arthur/arthur_1_1920.jpg',
            'hometown' => 'Oude Wetering',
            'description' => 'Mijn naam is Arthur, ik ben 25 en woon in Oude Wetering. Ik studeer Informatica aan de hogeschool in Leiden. Naast studeren werk ik als magazijnmedewerker bij een e-fulfillment agency.',
            'role' => 'Admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Benny',
            'lastname' => 'Bitcoin',
            'age' => 30,
            'email' => 'ben@miner.nl',
            'password' => bcrypt('OMGGRATISGELDMINEN'),
            'image' => 'img/users/benny/benny_1_1920.jpg',
            'image640' => 'img/users/benny/benny_1_640.jpg',
            'image1280' => 'img/users/benny/benny_1_1280.jpg',
            'image1920' => 'img/users/benny/benny_1_1920.jpg',
            'hometown' => 'Breda',
            'description' => 'Check me uit, ik ben een vet hippe oppas voor al jouw huisdieren',
        ]);

        DB::table('users')->insert([
            'name' => 'Eddy',
            'lastname' => 'Etherium',
            'age' => 27,
            'email' => 'ed@miner.com',
            'password' => bcrypt('GPUSZIJNOMCOINSTEMINEN'),
            'image' => 'img/users/eddy/eddy_1_1920.jpg',
            'image640' => 'img/users/eddy/eddy_1_640.jpg',
            'image1280' => 'img/users/eddy/eddy_1_1280.jpg',
            'image1920' => 'img/users/eddy/eddy_1_1920.jpg',
            'hometown' => 'Eindhoven',
            'description' => 'Check me uit, ik ben een vet hippe oppas voor al jouw huisdieren',
        ]);

        DB::table('users')->insert([
            'name' => 'Linda',
            'lastname' => 'Litecoin',
            'age' => 38,
            'email' => 'linda@miner.nl',
            'password' => bcrypt('LOLWATZEURENDIEGAMERSNOU'),
            'image' => 'img/users/linda/linda_1_1920.jpg',
            'image640' => 'img/users/linda/linda_1_640.jpg',
            'image1280' => 'img/users/linda/linda_1_1280.jpg',
            'image1920' => 'img/users/linda/linda_1_1920.jpg',
            'hometown' => 'Leiden',
            'description' => 'Check me uit, ik ben een vet hippe oppas voor al jouw huisdieren',
        ]);

        DB::table('users')->insert([
            'name' => 'Theo',
            'lastname' => 'Tether',
            'age' => 19,
            'email' => 'theo@miner.nl',
            'password' => bcrypt('IKWASNETTELAATMETBITCOIN'),
            'image' => 'img/users/theo/theo_1_1920.jpg',
            'image640' => 'img/users/theo/theo_1_640.jpg',
            'image1280' => 'img/users/theo/theo_1_1280.jpg',
            'image1920' => 'img/users/theo/theo_1_1920.jpg',
            'hometown' => 'Tilburg',
            'description' => 'Check me uit, ik ben een vet hippe oppas voor al jouw huisdieren',
        ]);

        DB::table('users')->insert([
            'name' => 'Priscilla',
            'lastname' => 'Polkadot',
            'age' => 22,
            'email' => 'priscilla@miner.nl',
            'password' => bcrypt('DOGECOINISDEHYPEGOZER'),
            'image' => 'img/users/priscilla/priscilla_1_1920.jpg',
            'image640' => 'img/users/priscilla/priscilla_1_640.jpg',
            'image1280' => 'img/users/priscilla/priscilla_1_1280.jpg',
            'image1920' => 'img/users/priscilla/priscilla_1_1920.jpg',
            'hometown' => 'Purmerend',
            'description' => 'Check me uit, ik ben een vet hippe oppas voor al jouw huisdieren',
        ]);

        DB::table('users')->insert([
            'name' => 'Carlo',
            'lastname' => 'Cardano',
            'age' => 24,
            'email' => 'carlo@miner.nl',
            'password' => bcrypt('IKSNAPHIEREIGENLIJKNIKSVAN'),
            'image' => 'img/users/carlo/carlo_1_1920.jpg',
            'image640' => 'img/users/carlo/carlo_1_640.jpg',
            'image1280' => 'img/users/carlo/carlo_1_1280.jpg',
            'image1920' => 'img/users/carlo/carlo_1_1920.jpg',
            'hometown' => 'Culemborg',
            'description' => 'Check me uit, ik ben een vet hippe oppas voor al jouw huisdieren',
        ]);

        DB::table('users')->insert([
            'name' => 'Christopher',
            'lastname' => 'Robin',
            'age' => 50,
            'email' => 'c.robin@disney.nl',
            'password' => bcrypt('HELPMEAUBVANDIEBEERAF:('),
            'image' => 'img/users/christopher/christopher_1.jpg',
            'image640' => 'img/users/christopher/christopher_1.jpg',
            'image1280' => 'img/users/christopher/christopher_1.jpg',
            'image1920' => 'img/users/christopher/christopher_1.jpg',
            'hometown' => 'Londen',
            'description' => 'Ik ben hier ook alleen maar omdat het moet...',
            'blocked' => 1,
        ]);
    }
}
