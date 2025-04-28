<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commande_personalises', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("etat")->default("en attente");
            $table->text("description");
            $table->string("address");
            $table->integer("numero");
            $table->text("image");
            $table->foreignId('id_panier')->constrained('paniers')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_personalises');
    }
};
