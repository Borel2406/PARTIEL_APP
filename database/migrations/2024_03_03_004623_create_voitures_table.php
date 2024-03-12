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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->date('DateAchat');
            $table->string('ParcoursDefaut');
            $table->string('Matricule');
            $table->string('Marque');
            $table->string('Couleur');
            $table->boolean('Statut');
            $table->unsignedBigInteger('chauffeur_id')->nullable(); // Ajoutez la colonne pour la clé étrangère
            $table->foreign('chauffeur_id')->references('id')->on('chauffeurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
