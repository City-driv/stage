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
            $table->enum('type_fact', ['facture','bon','bon_livraison','bon_cmd','facture_d_avoir','facture_proforma']);
            $table->date('date_facture')->nullable();
            $table->float('ttc');
            $table->float('ttva');
            $table->float('tht');
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->foreignId('user_id')->references('id')->on('users');
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
