<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('image')->nullable();
            $table->decimal('prix', 10, 2);
            $table->foreignId('id_fournisseur')->constrained('fournisseurs')->onDelete('cascade');
            $table->foreignId('id_admin')->constrained('comptes')->onDelete('cascade');
            $table->string('taille')->nullable();
            $table->string('couleur')->nullable();
            $table->boolean('offre')->default(false);
            $table->date('date_limit')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('produits');
    }
};
