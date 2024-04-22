<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddShortCode extends Model
{
    use HasFactory;

    protected $table = 'add_short_code';

    protected $fillable = [
        'short_code',
        'position',
        'mark_position',
        'status',
        'action',
        'school_code',
    ];
}
