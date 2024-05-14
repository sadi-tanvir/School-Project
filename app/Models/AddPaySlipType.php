<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddPaySlipType extends Model
{
    use HasFactory;
    protected $table = 'add_pay_slip_types';


    protected $fillable = [
        'pay_slip_type_name',
        'status',
        'action',
        'school_code',
    ];
}
