<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
                                         'name'  => 'Papel A4',
                                         'preco' => 5.20,
                                         'foto'  => null,
                                     ],
                                     [
                                         'name'  => 'Caneta',
                                         'preco' => 1.50,
                                         'foto'  => null,
                                     ],
                                     [
                                         'name'  => 'Isopôr',
                                         'preco' => 10.0,
                                         'foto'  => null,
                                     ]
        );
    }
}
