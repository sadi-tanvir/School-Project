<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_email',
        'school_name',
        'school_phone',
        'mobile_number',
        'address',
        'eiin',
        'website',
        'logo',
        'school_code',
    ];


    protected $table = 'school_info';
}

