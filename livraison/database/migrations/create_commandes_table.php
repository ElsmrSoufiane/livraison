<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produit')->constrained('produits')->onDelete('cascade');
            $table->foreignId('id_panier')->constrained('paniers')->onDelete('cascade');
            $table->foreignId('id_livreur')->nullable()->constrained('comptes')->onDelete('cascade');
            $table->integer('quantite');
            $table->string('address');
            $table->integer('numero');
            $table->decimal('prix_total', 10, 2);
            $table->text("etat")->default("en attente");
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('commandes');
    }
};
