<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('produits')->insert([
            'name' => Str::random(100),
            'stock' => random_int(0, 1000),
            'slug' => Str::random(100),
            'categrie' => 1,
        ]);
    }
}
