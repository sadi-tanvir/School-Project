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
        Schema::create('waivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_id')->constrained('add_fees')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('fee_type_name');
            $table->string('waiver_type_name');
            $table->integer('waiver_amount');
            $table->date('waiver_expire_date');
            $table->string('schoolCode');
            $table->enum('action', ['approved', 'pending'])->default('approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waivers');
    }
};
