<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class clientseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comptes')->insert([
            'nom' => 'client',
            'email' => 'client@example.com',
            'mot_de_passe' => Hash::make('motdepassefort'),
            'address' => '123 Rue Laravel',
            'numero' => '0600000000',
            'role' => 'compte',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
