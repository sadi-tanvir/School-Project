<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamMarkInput extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'student_id',
        'student_roll',
        'class_name',
        'group',
        'section',
        'shift',
        'exam_name',
        'year',
        'subject',
        'full_marks',
        'short_marks',
        'total_marks',
        'grade',
        'gpa',
        'school_code',
        'action',
        'status',
    ];

    protected $table="exam_marks_input";
}
