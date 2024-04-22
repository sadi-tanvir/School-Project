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
        Schema::create('fourth_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->string('year');
            $table->string('section');
            $table->string('group');
            $table->string('shift');
            $table->string('optional_subject');
            $table->string('compulsory_subject');
            $table->string('action');
            $table->string('student_id');
            $table->string('type');
            $table->string('school_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fourth_subjects');
    }
};
