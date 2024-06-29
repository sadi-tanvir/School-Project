<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualAttendance extends Model
{
    use HasFactory;
    protected $table = 'manual_attendances';

    protected $fillable = [
        'class',
        'group',
        'section',
        'year',
        'period',
        'date',
        'student_id',
        'name',
        'student_roll',
        'student_status',
        'sms',
        'status',
        'action',
        'school_code',
    ];
}
