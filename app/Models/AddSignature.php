<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSignature extends Model
{
    use HasFactory;

    protected $table = 'add_signature';

    protected $fillable = [
        'sign',
        'image',
        'action',
        'school_code',
    ];
}
