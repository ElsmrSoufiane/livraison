<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class fournisseurseder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminId = DB::table('comptes')->where('role', 'admin')->value('id');
        $categorieId = DB::table('categories')->value('id');
        DB::table('fournisseurs')->insert([
            [
                'nom' => 'Fournisseur Alpha',
                'localisation' => 'Casablanca',
                'description' => 'Spécialiste en fournitures technologiques.',
                'image' => 'alpha.jpg',
                'id_admin' => $adminId,
                'id_categorie' => $categorieId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Fournisseur Beta',
                'localisation' => 'Rabat',
                'description' => 'Fournisseur de vêtements professionnels.',
                'image' => 'beta.jpg',
                'id_admin' => $adminId,
                'id_categorie' => $categorieId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
