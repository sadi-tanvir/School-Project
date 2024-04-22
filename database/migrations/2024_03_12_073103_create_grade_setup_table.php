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
        Schema::create('grade_setup', function (Blueprint $table) {
            $table->id();
            $table->string('class_exam_name');
            $table->string('academic_year_name');
            $table->string('class_name');
            $table->string('latter_grade');
            $table->string('grade_point');
            $table->string('mark_point_1st');
            $table->string('mark_point_2nd');
            $table->string('status');
            $table->string('action');
            $table->string('school_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_setup');
    }
};
