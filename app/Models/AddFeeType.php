<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFeeType extends Model
{
    use HasFactory;

    protected $table = 'add_fee_types';


    protected $fillable = [
        'fee_type_name',
        'position',
        'status',
        'school_code',
        'action'
    ];
}
