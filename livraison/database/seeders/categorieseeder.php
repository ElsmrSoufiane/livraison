<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorieseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['categorie' => 'restaurants'],
            ['categorie' => 'patisserie'],
            ['categorie' => 'pharmacie'],
            ['categorie' => 'legumes et fruits'],
        
        ];

        DB::table('categories')->insert($categories);
    }
}
