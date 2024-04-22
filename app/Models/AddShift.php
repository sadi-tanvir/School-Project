<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddShift extends Model
{
    use HasFactory;
    protected $table = 'add_shift';

    protected $fillable = [
        'shift_name',
        'status',
        'action',
        'school_code',
    ];
}
