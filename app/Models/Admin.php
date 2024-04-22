<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'email',
        'role',
        'phone_number',
        'school_code',
        'password',
    ];

    protected $table="admins";
}
