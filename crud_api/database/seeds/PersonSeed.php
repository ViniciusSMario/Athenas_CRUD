<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('persons')->insert([
            'id' => 1,
            'name' => 'Jorge da Silva',
            'email' => 'jorge@terra.com.br',
            'categories_id' => 1
        ]);
        DB::table('persons')->insert([
            'id' => 2,
            'name' => 'Flavia Monteiro',
            'email' => 'flavia@globo.com',
            'categories_id' => 2
        ]);
        DB::table('persons')->insert([
            'id' => 3,
            'name' => 'Marcos Frota Ribeiro',
            'email' => 'ribeiro@gmail.com',
            'categories_id' => 2
        ]);
        DB::table('persons')->insert([
            'id' => 4,
            'name' => 'Raphael Souza Santos',
            'email' => 'rsantos@gmail.com',
            'categories_id' => 1
        ]);
        DB::table('persons')->insert([
            'id' => 5,
            'name' => 'Pedro Paulo Mota',
            'email' => 'ppmota@gmail.com',
            'categories_id' => 1
        ]);
        DB::table('persons')->insert([
            'id' => 6,
            'name' => 'Winder Carvalho da Silva',
            'email' => 'winder@hotmail.com',
            'categories_id' => 3
        ]);
        DB::table('persons')->insert([
            'id' => 7,
            'name' => 'Maria da Penha Albuquerque',
            'email' => 'mpa@hotmail.com',
            'categories_id' => 3
        ]);
        DB::table('persons')->insert([
            'id' => 8,
            'name' => 'Rafael Garcia Souza',
            'email' => 'rgsouza@hotmail.com',
            'categories_id' => 3
        ]);
        DB::table('persons')->insert([
            'id' => 9,
            'name' => 'Tabata Costa',
            'email' => 'tabata_costa@gmail.com',
            'categories_id' => 2
        ]);
        DB::table('persons')->insert([
            'id' => 10,
            'name' => 'Ronil Camarote',
            'email' => 'camarote@terra.com.br',
            'categories_id' => 1
        ]);
        DB::table('persons')->insert([
            'id' => 11,
            'name' => '	Joaquim Barbosa',
            'email' => 'barbosa@globo.com',
            'categories_id' => 1
        ]);
        DB::table('persons')->insert([
            'id' => 12,
            'name' => 'Eveline Maria Alcantra',
            'email' => 'ev_alcantra@gmail.com',
            'categories_id' => 2
        ]);
        DB::table('persons')->insert([
            'id' => 13,
            'name' => 'João Paulo Vieira',
            'email' => 'jpvieria@gmail.com',
            'categories_id' => 1
        ]);
        DB::table('persons')->insert([
            'id' => 14,
            'name' => 'Carla Zamborlini',
            'email' => 'Carla Zamborlini',
            'categories_id' => 3
        ]);
    }
}
