<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDepartment extends Model
{
    use HasFactory;

    protected $table = 'staff_departments';

    protected $fillable = [
        'department',
        'position',
        'status',
        'school_code',
        'action'
    ];
}
