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
        Schema::create('exam_process', function (Blueprint $table) {
            $table->id();
            $table->string('class');
            $table->string('group');
            $table->string('section');
            $table->string('student_id');
            $table->string('exam_name');
            $table->string('merit_status');
            $table->string('year');
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
        Schema::dropIfExists('exam_process');
        
    }
};
