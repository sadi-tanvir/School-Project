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
        Schema::create('add_messages', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('school_code');
            $table->string('message_count');
            $table->enum('action', ['pending', 'approved', 'delete', 'edit'])->default('approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_messages');
    }
};
