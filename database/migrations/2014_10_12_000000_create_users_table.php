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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('entreprise_name');
            $table->string('telephone');
            $table->string('ice');
            $table->enum('pack',['perso','starter','performance','demo']);
            $table->enum('status',['active','inactive','test'])->default('test');
            $table->string('fj')->nullable();
            $table->string('adresse')->nullable();
            $table->string('mobile')->nullable();
            $table->string('site_web')->nullable();
            $table->string('if')->nullable();
            $table->string('num_pattente')->nullable();
            $table->string('num_rc')->nullable();
            $table->string('cnss')->nullable();
            $table->string('img')->nullable();
            $table->integer('num_doc')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
