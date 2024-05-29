<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamProcess extends Model
{
    use HasFactory;
    protected $table = 'exam_process';

    protected $fillable = [
        'class',
        'group',
        'section',
        'student_id',
        'exam_name',
        'merit_status',
        'year',
        'status',
        'action',
        'school_code',
    ];
}
