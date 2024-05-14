<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddPaySlip extends Model
{
    use HasFactory;
    protected $table = "add_pay_slips";

    protected $fillable = [
        'class_name',
        'group_name',
        'pay_slip_type',
        'fee_type_name',
        'fees_amount',
        'status',
        'action',
        'school_code',
    ];
}
