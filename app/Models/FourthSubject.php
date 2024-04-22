<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FourthSubject extends Model
{
    use HasFactory;
    protected $table = 'fourth_subjects';
    protected $fillable = [
        'class_name',
        'year',
        'section',
        'group',
        'optional_subject',
        'compulsory_subject',
        'shift',
        'action',
        'student_id',
        'type',
        'school_code',
    ];
}
