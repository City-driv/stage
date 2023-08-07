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
        Schema::create('ligne_achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('achat_id')->references('id')->on('achats');
            $table->foreignId("article_id")->references('id')->on('articles');
            $table->integer('qte_cmd');
            $table->integer('qte_recue');
            $table->float('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_achats');
    }
};
