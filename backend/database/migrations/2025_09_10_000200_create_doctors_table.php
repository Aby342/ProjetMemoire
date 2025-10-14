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
        Schema::create('doctors', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
       $table->foreignId('specialite_id')->constrained()->onDelete('cascade');
    $table->string('name');
    $table->string('email')->unique(); // si chaque doctor a son propre email
    $table->string('phone')->nullable(); // si le téléphone est optionnel
    $table->integer('experience');
    $table->string('diplomes');
    $table->timestamps();
});


            

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
