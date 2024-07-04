<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendenceTimeSetup extends Model
{
    use HasFactory;
    protected $table = 'student_attendence_time';

    // Define the fillable attributes
    protected $fillable = [
        'class_name',
        'start_time',
        'end_time',
        'delay_time',
        'status',
        'school_code',
        'period'
    ];

}
