<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSubject extends Model
{
    use HasFactory;

    protected $table = 'add_subject';

    protected $fillable = [
        'subject_name',
        'subject_code',
        'position',
        'status',
        'action',
        'school_code',
    ];
}
