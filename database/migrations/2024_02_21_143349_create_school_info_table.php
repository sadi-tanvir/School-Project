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
        Schema::create('school_info', function (Blueprint $table) {
            $table->id();
            $table->string('school_email');
            $table->string('school_name');
            $table->string('school_phone');
            $table->string('mobile_number');
            $table->string('address');
            $table->string('eiin');
            $table->string('website');
            $table->string('school_code');
            $table->string('logo');
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_info');
    }
};
