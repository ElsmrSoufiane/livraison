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
            ['categorie' => 'Technologie'],
            ['categorie' => 'Maison'],
            ['categorie' => 'Livres'],
            ['categorie' => 'Vêtements'],
            ['categorie' => 'Sport'],
        ];

        DB::table('categories')->insert($categories);
    }
}
