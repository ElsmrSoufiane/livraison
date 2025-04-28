<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class panierseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        db::table('paniers')->insert([
            'id_client' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
