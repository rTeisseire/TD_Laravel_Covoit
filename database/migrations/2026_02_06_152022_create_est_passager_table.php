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
        Schema::create('est_passager_migration', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idEmploye')->constrained('employes_table');
            $table->foreignId('idTrajet')->constrained('trajets_table');
            $table->timestamps('dateInscription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('est_passager_migration');
    }
};
