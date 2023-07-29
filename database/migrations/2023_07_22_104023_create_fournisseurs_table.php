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
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('code_fournisseur');
            $table->enum('type_fournisseur', ['particulier', 'entreprise']);
            $table->string('nom_entreprise');
            $table->string('fj')->nullable();
            $table->string('ice')->nullable();
            $table->string('if')->nullable();
            $table->string('photo')->nullable();
            $table->string('adresse');
            $table->string('telephone');
            $table->string('mobile')->nullable();
            $table->string('code_postale')->nullable();
            $table->string('pays')->nullable();
            $table->string('num_compte')->nullable();
            $table->string('nom_banque')->nullable();
            $table->string('email');
            $table->string('site_internet')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournisseurs');
    }
};
