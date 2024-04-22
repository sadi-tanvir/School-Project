<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddAcademicYear extends Model
{
    use HasFactory;

    protected $table = 'add_academic_year';

    protected $fillable = [
        'academic_year_name',
        'status',
        'action',
        'school_code',
    ];
}
