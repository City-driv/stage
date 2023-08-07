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
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fournisseur_id')->references('id')->on('fournisseurs');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('numero');
            $table->date('date');
            $table->float('total');
            $table->float('remiseGlobal');
            $table->string('mode_paiement');
            $table->string('mode_livraison');
            $table->string('type');
            $table->string('piece_jointe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achats');
    }
};
