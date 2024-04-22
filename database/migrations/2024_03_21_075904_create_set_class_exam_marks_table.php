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
        Schema::create('set_class_exam_marks', function (Blueprint $table) {
            $table->id();
            $table->string('short_code');
            $table->string('class_name');
            $table->string('exam_name');
            $table->string('academic_year_name');
            $table->string('subject_name');
            $table->string('total_mark');
            $table->string('countable_mark');
            $table->string('pass_mark');
            $table->string('acceptance');
            $table->string('marge');
            $table->string('status');
            $table->string('school_code');
            $table->enum('action', ['pending', 'approved', 'delete', 'edit'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set_class_exam_marks');
    }
};
