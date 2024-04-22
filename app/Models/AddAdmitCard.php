<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddAdmitCard extends Model
{
    use HasFactory;

    protected $table = 'add_admit_card';

    protected $fillable = [
        'class_name',
        'group_name',
        'year',
        'class_exam_name',
        'subject_name',
        'exam_date',
        'exam_time',
        'status',
        'action',
        'school_code',
    ];
}
