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
        Schema::create('institute_info', function (Blueprint $table) {
            $table->id();
            $table->string('institute_code')->unique();
            $table->string('institute_name');
            $table->string('eiin');
            $table->string('address1');
            $table->string('address2');
            $table->string('phone', 11)->unique();
            $table->string('fax');
            $table->string('email')->unique();
            $table->string('website');
            $table->string('logo');
            $table->enum('status', ['active', 'in active'])->default('active');
            $table->enum('action', ['pending', 'approved', 'delete', 'edit'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institute_info');
    }
};
