<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddAcademicSession extends Model
{
    use HasFactory;

    protected $table = 'add_academic_session';

    protected $fillable = [
        'academic_session_name',
        'status',
        'action',
        'school_code',
    ];
}
