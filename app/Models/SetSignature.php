<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetSignature extends Model
{
    use HasFactory;
    protected $table = 'set_signature';

    protected $fillable = [
        'report_name',
        'signature_name',
        'positions',
        'status',
        'action',
        'school_code',
    ];
}
