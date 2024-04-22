<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetClassExamMark extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_name',
        'exam_name',
        'academic_year_name',
        'short_code',
        'total_mark',
        'countable_mark',
        'pass_mark',
        'acceptance',
        'marge',
        'status',
        'school_code',
        'action',
    ];

    protected $table = 'set_class_exam_marks';
}
