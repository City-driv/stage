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
        Schema::create('numerotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('clt')->default('CLT-');
            $table->string('art')->default('ART-');
            $table->string('fact')->default('FACT-');
            $table->string('bon_liv')->default('BL-');
            $table->string('bon_cmd')->default('BC-');
            $table->string('bon')->default('BN-');
            $table->string('devis')->default('DV-');
            $table->string('fact_pro')->default('FP-');
            $table->string('fact_d_avoir')->default('FAV-');
            $table->integer('alr_inf')->default('10');
            $table->integer('alr_sup')->default('5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('numerotations');
    }
};
