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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_demande');
            $table->decimal('distance_total', 10, 2);
            $table->string('matricule');
            $table->string('status')->default('en attente');
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();

            // Add foreign key constraint for matricule
            $table->foreign('matricule')
                  ->references('matricule')
                  ->on('automobiles')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
