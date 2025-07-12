<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
           
            ['categorie' => 'Jabadors'],
          
            ['categorie' => 'Accessoires'],
           
        ];

        DB::table('categories')->insert($categories);
    }
}