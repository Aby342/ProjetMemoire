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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references("id")->on("users")->OnDelete("cascade");
            $table->date("date_naissance");
            $table->string("adresse");
            $table->enum("groupe_sanguin", [
               'A_PLUS','A_MOINS','B_PLUS','B_MOINS','AB_PLUS','AB_MOINS','O_PLUS','O_MOINS'
    ])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
