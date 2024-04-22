<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSection extends Model
{
    use HasFactory;

    protected $table = 'add_section';

    protected $fillable = [
        'section_name',
        'status',
        'action',
        'school_code',
    ];
}
