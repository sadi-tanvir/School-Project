<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAdmin extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'school_name',
        'school_code',
        'mobile_number',
        'image',
        'role', 
    ];
    protected $table = 'school_admins';
}
