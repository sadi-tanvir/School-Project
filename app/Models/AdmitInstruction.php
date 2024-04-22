<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmitInstruction extends Model
{
    use HasFactory;
    protected $table = 'add_admit_instruction';

    protected $fillable = [
        'instruction',
        'status',
        'action',
        'school_code',
    ];
}
