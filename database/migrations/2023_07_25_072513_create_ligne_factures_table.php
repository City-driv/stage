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
        Schema::create('ligne_factures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facture_id')->references('id')->on('factures')->onDelete('cascade');
            $table->foreignId('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('quantite')->default(1);
            $table->integer('remise')->default(0);
            $table->integer('tva')->default('20');
            $table->double('ttc', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_factures');
    }
};
