<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('star_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained()->onDelete('cascade');
            $table->foreignId('compte_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('note')->unsigned()->comment('Star rating from 1 to 5');
            $table->timestamps();

            // Optional: prevent a user from rating the same product multiple times
            $table->unique(['produit_id', 'compte_id']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('star_ratings');
    }
};
