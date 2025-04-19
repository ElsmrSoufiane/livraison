<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('mot_de_passe');
            $table->string('address'); // <-- corrigé ici
            $table->string('numero');
            $table->enum('role', ['admin', 'compte', 'livreur'])->default('livreur');;
            $table->timestamps();
        });
        
    }

    public function down(): void {
        Schema::dropIfExists('comptes');
    }
};
