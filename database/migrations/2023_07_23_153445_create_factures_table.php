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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->enum('type_fact', ['facture','bon','bon_livraison','bon_cmd','facture_d_avoir','facture_proforma','devis']);
            $table->date('date_facture')->nullable();
            $table->double('ttc', 15, 2);
            $table->double('ttva', 15, 2);
            $table->double('tht', 15, 2);
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('exemple')->default('ex1');
            $table->string('mode_paiement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
