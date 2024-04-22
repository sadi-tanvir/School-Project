<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SequentialExam extends Model
{
    use HasFactory;
    protected $table = 'sequential_wise_exam';

    protected $fillable = [
        'class_name',
        'exam_name',
        'year',
        'sequential_exam',
        'action',
        'school_code',
    ];


}
