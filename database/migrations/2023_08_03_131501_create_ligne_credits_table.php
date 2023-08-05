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
        Schema::create('ligne_credits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credit_id')->references('id')->on('credits');
            $table->float('montant');
            $table->date('date');
            $table->string('observation')->nullable();
            $table->string('mode_paiement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_credits');
    }
};
