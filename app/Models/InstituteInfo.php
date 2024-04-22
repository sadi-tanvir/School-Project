<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteInfo extends Model
{
    use HasFactory;

    protected $table = 'institute_info';

    protected $fillable = [
        'institute_code',
        'institute_name',
        'eiin',
        'address1',
        'address2',
        'phone',
        'fax',
        'email',
        'website',
        'logo',
        'status',
        'action'
    ];
}
