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
        Schema::create('staff_designations', function (Blueprint $table) {
            $table->id();
            $table->string("designation");
            $table->integer("position");
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('action', ['pending', 'approved', 'delete', 'edit'])->default('approved');
            $table->string('school_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_designations');
    }
};
