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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id')->unique();
            $table->string('name',100);
            $table->string('mobile' ,14);
            $table->string('image');
            $table->string('emg_mobile',14);
            $table->string('email',20);
            $table->string('password',20);
            $table->string('fbid');
            $table->string('department',150);
            $table->string('designation',30);
            $table->string('gender',100);
            $table->string('subject',30);
            $table->string('index',30);
            $table->string('salary_account');
            $table->string('pf');
            $table->string('father_name',100);
            $table->string('father_mobile',14);
            $table->string('mother_name',100);
            $table->string('mother_number',14);
            $table->string('birth_date',100);
            $table->string('nationality',50);
            $table->string('blood',10);
            $table->string('nid',30);
            $table->string('marital_status',30);
            $table->string('age',30);
            $table->string('religious',30);
            $table->string('joining_date',100);
            $table->string('present_village',100);
            $table->string('present_post_office',100);
            $table->string('present_zip_code',100);
            $table->string('present_district',100);
            $table->string('present_police_station',100);
            $table->string('parmanent_village',100);
            $table->string('parmanent_post_office',100);
            $table->string('parmanent_zip_code',100);
            $table->string('parmanent_district',100);
            $table->string('parmanent_police_station',100);
            $table->string('ssc',100);
            $table->string('school_name',100);
            $table->string('ssc_department',100);
            $table->string('ssc_roll',100);
            $table->string('ssc_reg',100);
            $table->string('ssc_gpa',100);
            $table->string('ssc_year',100);
            $table->string('hsc',30);
            $table->string('college_name',200);
            $table->string('college_department',100);
            $table->string('college_roll',100);
            $table->string('college_reg',50);
            $table->string('college_gpa',50);
            $table->string('college_passing_year',50);
            $table->string('honors',100);
            $table->string('versity_name',100);
            $table->string('versity_department',100);
            $table->string('versity_roll',100);
            $table->string('versity_reg',100);
            $table->string('versity_gpa',100);
            $table->string('versity_passing_year',100);
            $table->string('qua_name',100);
            $table->string('qua_industry_name',100);
            $table->string('qua_description',100);
            $table->string('qua_2_name', 255)->nullable();
            $table->string('qua_2_industry_name',100);
            $table->string('qua_2_description',100);
            $table->string('post_name',100);
            $table->string('industrial_name',100);
            $table->string('start_date',100);
            $table->string('end_date',100);
            $table->string('school_code',100);
            $table->string('role');
            $table->enum('action', ['pending', 'approved', 'delete', 'edit'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
