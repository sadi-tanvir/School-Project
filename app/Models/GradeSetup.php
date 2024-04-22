<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeSetup extends Model
{
    use HasFactory;


    protected $table = 'grade_setup';

    protected $fillable = [
        'class_exam_name',
        'academic_year_name',
        'class_name',
        'latter_grade',
        'grade_point',
        'mark_point_1st',
        'mark_point_2nd',
        'status',
        'action',
        'school_code',
    ];
}
