<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contact',
        'school_code',
        'action',
    ];

    protected $table="total_contacts";
}
