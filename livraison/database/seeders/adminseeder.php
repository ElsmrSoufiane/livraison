<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comptes')->insert([
            'nom' => 'Admin',
            'email' => 'admin@example.com',
            'mot_de_passe' => Hash::make('motdepassefort'),
            'address' => '123 Rue Laravel',
            'numero' => '0600000000',
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
