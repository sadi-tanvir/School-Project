<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddPeriod extends Model
{
    use HasFactory;

    protected $table = 'add_period';

    protected $fillable = [
        'class_period',
        'position',
        'status',
        'action',
        'school_code',
    ];
}
