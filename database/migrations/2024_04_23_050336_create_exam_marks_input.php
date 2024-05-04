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
        Schema::create('exam_marks_input', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('student_id')->nullable();
            $table->string('student_roll')->nullable();
            $table->string('class_name')->nullable();
            $table->string('group')->nullable();
            $table->string('section')->nullable();
            $table->string('shift')->nullable();
            $table->string('exam_name')->nullable();
            $table->string('year')->nullable();
            $table->string('subject')->nullable();
            $table->string('full_marks')->nullable();
            $table->string('short_marks')->nullable();
            $table->string('total_marks')->nullable();
            $table->string('grade')->nullable();
            $table->string('gpa')->nullable();
            $table->string('school_code');
            $table->enum('action', ['pending', 'approved', 'delete', 'edit'])->nullable()->default('approved');
            $table->enum('status', ['absent', 'present'])->default('present');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_marks_input');
    }
};
