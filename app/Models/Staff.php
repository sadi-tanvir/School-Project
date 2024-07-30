<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'staff_id',
        'name',
        'mobile',
        'image',
        'emg_mobile',
        'email',
        'password',
        'fbid',
        'department',
        'designation',
        'gender',
        'subject',
        'index',
        'salary_account',
        'pf',
        'father_name',
        'father_mobile',
        'mother_name',
        'mother_number',
        'birth_date',
        'nationality',
        'blood',
        'nid',
        'marital_status',
        'age',
        'religious',
        'joining_date',
        'present_village',
        'present_post_office',
        'present_zip_code',
        'present_district',
        'present_police_station',
        'parmanent_village',
        'parmanent_post_office',
        'parmanent_zip_code',
        'parmanent_district',
        'parmanent_police_station',
        'ssc',
        'school_name',
        'ssc_department',
        'ssc_roll',
        'ssc_reg',
        'ssc_gpa',
        'ssc_year',
        'hsc',
        'college_name',
        'college_department',
        'college_roll',
        'college_reg',
        'college_gpa',
        'college_passing_year',
        'honors',
        'versity_name',
        'versity_department',
        'versity_roll',
        'versity_reg',
        'versity_gpa',
        'versity_passing_year',
        'qua_name',
        'qua_industry_name',
        'qua_description',
        'qua_2_name',
        'qua_2_industry_name',
        'qua_2_description',
        'post_name',
        'industrial_name',
        'start_date',
        'end_date',
        'school_code',
        'role',
        'action',
    ];

    protected $table="staffs";
}
