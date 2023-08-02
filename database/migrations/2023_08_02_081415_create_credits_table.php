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
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('clients');
            $table->string('type')->nullable();
            $table->string('ref')->nullable();
            $table->float('p_marchandise');
            $table->float('p_avance');
            $table->float('p_reste');
            $table->string('motif');
            $table->string('mode_paiment')->nullable();
            $table->date('date_credit');
            $table->string('piece_jointe')->nullable();
            $table->string('observation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credits');
    }
};
