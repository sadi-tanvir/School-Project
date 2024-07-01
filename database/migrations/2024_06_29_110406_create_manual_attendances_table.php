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
        Schema::create('manual_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('class');
            $table->string('group');
            $table->string('section');
            $table->string('year');
            $table->string('period')->nullable();
            $table->string('subject')->nullable();
            $table->string('date');
            $table->string('student_id');
            $table->string('name');
            $table->string('student_roll');
            $table->string('student_status');
            $table->string('sms');
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
        Schema::dropIfExists('manual_attendances');
    }
};
