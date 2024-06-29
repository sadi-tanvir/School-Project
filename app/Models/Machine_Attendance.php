<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine_Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'in_time',
        'out_time',
        'machine_no',
    ];
    protected $table = 'machine_attendances';
}
