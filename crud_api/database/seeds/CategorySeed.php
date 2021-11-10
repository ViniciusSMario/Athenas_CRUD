<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Admin',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Gerente',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Normal',
        ]);
    }
}
