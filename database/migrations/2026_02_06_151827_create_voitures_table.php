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
        Schema::create('voitures_table', function (Blueprint $table) {
            $table->id();
            $table->string('modele');
            $table->integer('nbPlaces');
            $table->foreignId('idEmploye')->constrained('employes_table');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures_table');
    }
};
