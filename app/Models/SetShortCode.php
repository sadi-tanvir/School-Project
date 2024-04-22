<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetShortCode extends Model
{
    use HasFactory;

    protected $table = 'set_short_code';

    protected $fillable = [
        'class_name',
        'class_exam_name',
        'academic_year_name',
        'short_code',
        'status',
        'action',
        'school_code',
    ];



}
