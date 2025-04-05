<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('paniers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_client')->constrained('comptes')->onDelete('cascade');

            $table->decimal('prix_total', 10, 2);
            $table->foreignId('id_livreur')->constrained('comptes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('paniers');
    }
};
