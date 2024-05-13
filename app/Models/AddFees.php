<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFees extends Model
{
    use HasFactory;


    protected $table = 'add_fees';

    protected $fillable = [
        'class_name',
        'group_name',
        'fee_type',
        'fee_amount',
        'status',
        'action',
        'school_code',
    ];
}
