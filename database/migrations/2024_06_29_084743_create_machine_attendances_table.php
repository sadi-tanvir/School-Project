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
        Schema::create('machine_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->dateTime('in_time');
            $table->dateTime('out_time');
            $table->string('machine_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine_attendances');
    }
};
