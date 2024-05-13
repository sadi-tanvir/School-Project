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
        Schema::create('add_fee_types', function (Blueprint $table) {
            $table->id();
            $table->string('fee_type_name');
            $table->integer('position');
            $table->enum('action', ['pending', 'approved', 'delete', 'edit'])->default('approved');
            $table->string('school_code');
            $table->enum('status', ['active', 'in active'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_fee_types');
    }
};
