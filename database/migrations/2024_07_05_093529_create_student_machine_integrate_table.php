<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_machine_integrate', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('machine_user_id');
            $table->string('student_name');
            $table->string('student_roll');
            $table->string('class');
            $table->string('section');
            $table->string('group');
            $table->string('school_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_machine_integrate');
    }
};
