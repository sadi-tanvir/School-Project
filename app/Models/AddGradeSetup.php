<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddGradeSetup extends Model
{
    use HasFactory;


    protected $table = 'add_grade_setup';

    protected $fillable = [
        'class_name',
        'exam_name',
        'year_name',
        'letter',
        'grade',
        '1st_range',
        '2nd_range',
        'status',
        'action',
        'school_code',
    ];
}
