<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('localisation');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('id_admin')->constrained('comptes')->onDelete('cascade');
            $table->foreignId('id_categorie')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('fournisseurs');
    }
};
