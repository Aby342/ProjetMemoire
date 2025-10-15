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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references("id")->on("users")->Ondelete("cascade");
            $table->foreignId("doctor_id")->references("id")->on("doctors")->Ondelete("cascade");
            $table->foreignId("appointment_id")->references("id")->on("appointments")->Ondelete("cascade");
            $table->string("medication");
            $table->string("instructions");
            $table->timestamps();



          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
