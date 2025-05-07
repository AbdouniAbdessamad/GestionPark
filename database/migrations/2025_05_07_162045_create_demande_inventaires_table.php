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
        Schema::create('demande_inventaires', function (Blueprint $table) {
            $table->id();
            $table->date('date_demande');
            $table->string('libelle');
            $table->integer('quantite');
            $table->enum('status', ['en attente', 'approuvé', 'rejeté'])->default('en attente');
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_inventaires');
    }
};
