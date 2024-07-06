<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMachineIntegrate extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'machine_user_id',
        'student_name',
        'student_roll',
        'class',
        'section',
        'group',
        'school_code',
    ];

    protected $table="student_machine_integrate";
}
