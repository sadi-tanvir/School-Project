<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrandFinal extends Model
{
    use HasFactory;

    protected $table = 'addgrand_finals';

    protected $fillable = [
        'class_name',
        'class_exam_name',
        'percentage',
        'serial',
        'status',
        'action',
        'school_code',
    ];
}
