<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddClassWiseShift extends Model
{
    use HasFactory;

    protected $table = 'add_class_wise_shift';

    protected $fillable = [
        'class_name',
        'shift_name',
        'status',
        'action',
        'school_code',
    ];
}
