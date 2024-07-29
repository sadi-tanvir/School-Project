<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDesignation extends Model
{
    use HasFactory;

    protected $table = 'staff_designations';

    protected $fillable = [
        'designation',
        'position',
        'status',
        'school_code',
        'action'
    ];
}
