<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddClassWiseSection extends Model
{
    use HasFactory;

    protected $table = 'add_class_wise_section';

    protected $fillable = [
        'class_name',
        'section_name',
        'status',
        'action',
        'school_code',
    ];
}
