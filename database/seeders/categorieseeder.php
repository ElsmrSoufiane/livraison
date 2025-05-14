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
            ['categorie' => 'Ordinateurs portables'],
            ['categorie' => 'Accessoires PC'],
            ['categorie' => 'Composants PC'],
            ['categorie' => 'Périphériques'],
            ['categorie' => 'Réseaux & Internet'],
            ['categorie' => 'Stockage'],
            ['categorie' => 'Support & câblage'],
            ['categorie' => 'Gaming'],
        
        ];

        DB::table('categories')->insert($categories);
    }
}
