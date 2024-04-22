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
        Schema::create('subject_setup', function (Blueprint $table) {
            $table->id();
            // $table->string('class_name');
            // $table->string('group_name');
            // $table->string('subject_name');
            // $table->string('subject_type');
            // $table->string('subject_serial');
            // $table->string('subject_marge');
            // $table->enum('status', ['active', 'in active'])->default('active');
            // $table->enum('action', ['pending', 'approved', 'delete', 'edit'])->default('pending');
            // $table->string('school_code');



// This section delete


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_setup');
    }
};
