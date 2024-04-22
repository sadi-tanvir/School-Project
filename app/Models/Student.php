<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'student_roll',
        'student_id',
        'nedubd_student_id',
        'class_name',
        'group',
        'section',
        'shift',
        'category',
        'year',
        'gender',
        'religious',
        'nationality',
        'blood_group',
        'session',
        'status',
        'image',
        'admission_date',
        'mobile_no',
        'father_name',
        'father_mobile',
        'father_occupation',
        'father_nid',
        'father_birth_date',
        'mother_name',
        'mother_number',
        'mother_occupation',
        'mother_nid',
        'mother_birth_date',
        'mother_income',
        'present_village',
        'present_post_office',
        'present_country',
        'present_zip_code',
        'present_district',
        'present_police_station',
        'permanent_village',
        'permanent_post_office',
        'permanent_country',
        'permanent_zip_code',
        'permanent_district',
        'permanent_police_station',
        'guardian_name',
        'guardian_address',
        'last_school_name',
        'last_class_name',
        'last_result',
        'last_passing_year',
        'email',
        'password',
        'school_code',
        'action',
        'role',
        
    ];

    protected $table="students";
}
