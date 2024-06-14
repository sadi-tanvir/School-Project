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
        'messages',
        'number_of_print_page',
    ];


    protected $table = 'school_info';
}

