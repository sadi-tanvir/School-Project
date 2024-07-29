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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id')->unique();
            $table->string('name', 100);
            $table->string('mobile', 14)->nullable();
            $table->string('image')->nullable();
            $table->string('emg_mobile', 14)->nullable();
            $table->string('email', 20)->nullable();
            $table->string('password', 20)->nullable();
            $table->string('fbid')->nullable();
            $table->string('department', 150)->nullable();
            $table->string('designation', 30)->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('subject', 30)->nullable();
            $table->string('index', 30)->nullable();
            $table->string('salary_account')->nullable();
            $table->string('pf')->nullable();
            $table->string('father_name', 100)->nullable();
            $table->string('father_mobile', 14)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('mother_number', 14)->nullable();
            $table->string('birth_date', 100)->nullable();
            $table->string('nationality', 50)->nullable();
            $table->string('blood', 10)->nullable();
            $table->string('nid', 30)->nullable();
            $table->string('marital_status', 30)->nullable();
            $table->string('age', 30)->nullable();
            $table->string('religious', 30)->nullable();
            $table->string('joining_date', 100)->nullable();
            $table->string('present_village', 100)->nullable();
            $table->string('present_post_office', 100)->nullable();
            $table->string('present_zip_code', 100)->nullable();
            $table->string('present_district', 100)->nullable();
            $table->string('present_police_station', 100)->nullable();
            $table->string('parmanent_village', 100)->nullable();
            $table->string('parmanent_post_office', 100)->nullable();
            $table->string('parmanent_zip_code', 100)->nullable();
            $table->string('parmanent_district', 100)->nullable();
            $table->string('parmanent_police_station', 100)->nullable();
            $table->string('ssc', 100)->nullable();
            $table->string('school_name', 100)->nullable();
            $table->string('ssc_department', 100)->nullable();
            $table->string('ssc_roll', 100)->nullable();
            $table->string('ssc_reg', 100)->nullable();
            $table->string('ssc_gpa', 100)->nullable();
            $table->string('ssc_year', 100)->nullable();
            $table->string('hsc', 30)->nullable();
            $table->string('college_name', 200)->nullable();
            $table->string('college_department', 100)->nullable();
            $table->string('college_roll', 100)->nullable();
            $table->string('college_reg', 50)->nullable();
            $table->string('college_gpa', 50)->nullable();
            $table->string('college_passing_year', 50)->nullable();
            $table->string('honors', 100)->nullable();
            $table->string('versity_name', 100)->nullable();
            $table->string('versity_department', 100)->nullable();
            $table->string('versity_roll', 100)->nullable();
            $table->string('versity_reg', 100)->nullable();
            $table->string('versity_gpa', 100)->nullable();
            $table->string('versity_passing_year', 100)->nullable();
            $table->string('qua_name', 100)->nullable();
            $table->string('qua_industry_name', 100)->nullable();
            $table->string('qua_description', 100)->nullable();
            $table->string('qua_2_name', 255)->nullable();
            $table->string('qua_2_industry_name', 100)->nullable();
            $table->string('qua_2_description', 100)->nullable();
            $table->string('post_name', 100)->nullable();
            $table->string('industrial_name', 100)->nullable();
            $table->string('start_date', 100)->nullable();
            $table->string('end_date', 100)->nullable();
            $table->string('school_code', 100)->nullable();
            $table->string('role')->nullable();
            $table->enum('action', ['pending', 'approved', 'delete', 'edit'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
