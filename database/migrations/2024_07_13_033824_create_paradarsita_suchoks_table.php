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
        Schema::create('paradarsita_suchoks', function (Blueprint $table) {
            $table->id();
            $table->string("class");
            $table->string("subject");
            $table->string("segment");
            $table->string("suchok_name");
            $table->string("suchok_value");
            $table->text("suchok_matra_rectengle");
            $table->text("suchok_matra_circle");
            $table->text("suchok_matra_triangle");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paradarsita_suchoks');
    }
};
