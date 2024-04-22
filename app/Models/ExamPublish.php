<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamPublish extends Model
{
    use HasFactory;

    protected $table = 'exam_publish';

    protected $fillable = [
        'Class_name',
        'exam_name',
        'year',
        'status',
        'action',
        'school_code',
    ];
}
