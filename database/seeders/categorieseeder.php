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
            ['categorie' => 'Caftans'],
            ['categorie' => 'Jabadors'],
            ['categorie' => 'Takchitas'],
            ['categorie' => 'Robes traditionnelles'],
            ['categorie' => 'Accessoires (ceintures, babouches)'],
            ['categorie' => 'Vêtements pour hommes (Jellabas, Gandouras)'],
            ['categorie' => 'Vêtements pour enfants'],
            ['categorie' => 'Tenues de mariage'],
            ['categorie' => 'Pieces brodées à la main'],
            ['categorie' => 'Tissus traditionnels'],
        ];

        DB::table('categories')->insert($categories);
    }
}