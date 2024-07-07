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
        Schema::create('add_admit_card', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->string('group_name');
            $table->string('year');
            $table->string('class_exam_name');
            $table->string('subject_name');
            $table->string('exam_date');
            $table->string('start_time');
            $table->string('end_time');
            $table->enum('status', ['active', 'in active'])->default('active');
            $table->enum('action', ['pending', 'approved', 'delete', 'edit'])->default('pending');
            $table->string('school_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_admit_card');
    }
};
