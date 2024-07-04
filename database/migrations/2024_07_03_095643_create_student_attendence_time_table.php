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
        Schema::create('student_attendence_time', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->string('school_code');
            $table->string('period');
            $table->time('start_time');
            $table->time('end_time');
            $table->time('delay_time')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_attendence_time');
    }
};
